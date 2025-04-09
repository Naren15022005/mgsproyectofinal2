<?php

namespace App\Http\Controllers;

use App\Models\FlujosIEs;
use App\Models\CategoriaFlujosIEs;
use App\Models\User;
use App\Http\Requests\FlujoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FlujoIEController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categorias = CategoriaFlujosIEs::all();
        
        $flujos = FlujosIEs::with(['categoria', 'usuario'])
            ->latest()
            ->when(!$user->hasRole('administrador'), function($query) use ($user) {
                return $query->where('usuario_id', $user->id);
            })
            ->paginate(15);

        if ($user->hasRole('administrador')) {
            return view('admin.flujos.index', compact('flujos', 'categorias'));
        } elseif ($user->hasRole('recepcionista')) {
            return view('recepcionista.flujos.index', compact('flujos', 'categorias'));
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    }

    public function create()
    {
        $categorias = CategoriaFlujosIEs::all();
        $user = Auth::user();

        if ($user->hasRole('administrador')) {
            $usuarios = User::role(['recepcionista', 'administrador'])->get();
            return view('admin.flujos.create', compact('categorias', 'usuarios'));
        } elseif ($user->hasRole('recepcionista')) {
            return view('recepcionista.flujos.create', compact('categorias'));
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    }

    public function store(FlujoRequest $request)
    {
        try {
            $flujo = DB::transaction(function () use ($request) {
                $data = $request->validated();
                $data['usuario_id'] = Auth::id();
                $data['fecha'] = now();
                
                return FlujosIEs::create($data);
            });

            $user = Auth::user();
            if ($user->hasRole('administrador')) {
                return redirect()->route('admin.flujos.index')->with('success', 'Flujo creado correctamente (ID: '.$flujo->id.')');
            } elseif ($user->hasRole('recepcionista')) {
                return redirect()->route('recepcionista.flujos.index')->with('success', 'Flujo creado correctamente (ID: '.$flujo->id.')');
            } else {
                abort(403, 'No tienes permiso para acceder a esta página.');
            }

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Error al crear el flujo: '.$e->getMessage());
        }
    }

    public function show($id)
    {
        $flujo = FlujosIEs::with(['categoria', 'usuario'])->findOrFail($id);
        $user = Auth::user();
        
        if (!($user->hasRole('administrador') || $flujo->usuario_id == $user->id)) {
            abort(403, 'No tienes permiso para ver este flujo');
        }

        if ($user->hasRole('administrador')) {
            return view('admin.flujos.show', compact('flujo'));
        } elseif ($user->hasRole('recepcionista')) {
            return view('recepcionista.flujos.show', compact('flujo'));
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    }

    public function edit($id)
    {
        $flujo = FlujosIEs::findOrFail($id);
        $user = Auth::user();
        
        if (!($user->hasRole('administrador') || $flujo->usuario_id == $user->id)) {
            abort(403, 'No tienes permiso para editar este flujo');
        }

        $categorias = CategoriaFlujosIEs::all();
        
        if ($user->hasRole('administrador')) {
            $usuarios = User::role(['recepcionista', 'administrador'])->get();
            return view('admin.flujos.edit', compact('flujo', 'categorias', 'usuarios'));
        } elseif ($user->hasRole('recepcionista')) {
            return view('recepcionista.flujos.edit', compact('flujo', 'categorias'));
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    }

    public function update(FlujoRequest $request, $id)
    {
        try {
            $flujo = FlujosIEs::findOrFail($id);
            $user = Auth::user();
            
            if (!($user->hasRole('administrador') || $flujo->usuario_id == $user->id)) {
                abort(403, 'No tienes permiso para editar este flujo');
            }

            DB::transaction(function () use ($request, $flujo) {
                $flujo->update($request->validated());
            });

            if ($user->hasRole('administrador')) {
                return redirect()->route('admin.flujos.index')->with('success', 'Flujo actualizado correctamente');
            } elseif ($user->hasRole('recepcionista')) {
                return redirect()->route('recepcionista.flujos.index')->with('success', 'Flujo actualizado correctamente');
            } else {
                abort(403, 'No tienes permiso para acceder a esta página.');
            }

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Error al actualizar el flujo: '.$e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $flujo = FlujosIEs::findOrFail($id);
            $user = Auth::user();
            
            if (!($user->hasRole('administrador') || $flujo->usuario_id == $user->id)) {
                abort(403, 'No tienes permiso para eliminar este flujo');
            }

            DB::transaction(function () use ($flujo) {
                $flujo->delete();
            });

            if ($user->hasRole('administrador')) {
                return redirect()->route('admin.flujos.index')->with('success', 'Flujo eliminado correctamente');
            } elseif ($user->hasRole('recepcionista')) {
                return redirect()->route('recepcionista.flujos.index')->with('success', 'Flujo eliminado correctamente');
            } else {
                abort(403, 'No tienes permiso para acceder a esta página.');
            }

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Error al eliminar el flujo: '.$e->getMessage());
        }
    }

    public function storeFromPos(Request $request)
    {
        try {
            $validated = $request->validate([
                'monto' => 'required|numeric|min:1000|max:10000000',
                'descripcion' => 'nullable|string|max:255'
            ]);

            $categoria = CategoriaFlujosIEs::firstOrCreate(
                ['nombre' => 'Servicio'],
                ['descripcion' => 'Ingresos por servicios del gimnasio']
            );

            $flujo = DB::transaction(function () use ($validated, $categoria) {
                return FlujosIEs::create([
                    'tipo' => 'Ingreso',
                    'monto' => $validated['monto'],
                    'descripcion' => $validated['descripcion'] ?? 'Cierre de caja del día - '.now()->format('d/m/Y'),
                    'fecha' => now(),
                    'categoria_id' => $categoria->id,
                    'usuario_id' => Auth::id(),
                    'origen' => 'POS'
                ]);
            });

            return response()->json([
                'success' => true,
                'message' => 'Ingreso registrado correctamente',
                'data' => [
                    'id' => $flujo->id,
                    'monto' => $flujo->monto,
                    'fecha' => $flujo->fecha->format('d/m/Y H:i')
                ]
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error en los datos proporcionados',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado: '.$e->getMessage()
            ], 500);
        }
    }
}