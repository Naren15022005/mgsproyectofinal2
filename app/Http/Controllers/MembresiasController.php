<?php

namespace App\Http\Controllers;

use App\Models\Membresias;
use App\Models\TipoDeMembresia;
use App\Models\OpcionDeAcceso;
use Illuminate\Http\Request;

class MembresiasController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:administrador|recepcionista');
    }

    private function getViewForRole($view, $data = [])
    {
        $user = auth()->user();
        if ($user->hasRole('administrador')) {
            return view("admin.$view", $data);
        } elseif ($user->hasRole('recepcionista')) {
            return view("recepcionista.$view", $data);
        }

        abort(403, 'No tienes permiso para acceder a esta página.');
    }

    private function redirectForRole($route, $message)
    {
        $user = auth()->user();
        if ($user->hasRole('administrador')) {
            return redirect()->route("admin.$route")->with('success', $message);
        } elseif ($user->hasRole('recepcionista')) {
            return redirect()->route("recepcionista.$route")->with('success', $message);
        }

        abort(403, 'No tienes permiso para acceder a esta página.');
    }

    public function index()
    {
        $membresias = Membresias::with(['tipoMembresia', 'opcionesDeAcceso'])->get();
        $tiposMembresia = TipoDeMembresia::all();
        $accesos = OpcionDeAcceso::all();

        return $this->getViewForRole('membresias.index', compact('membresias', 'tiposMembresia', 'accesos'));
    }

    public function create()
    {
        $tiposMembresia = TipoDeMembresia::all();
        $accesos = OpcionDeAcceso::all();

        return $this->getViewForRole('membresias.create', compact('tiposMembresia', 'accesos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_membresia_id' => 'required|exists:tipos_de_membresia,id',
            'precio' => 'required|numeric',
            'duracion' => 'required|integer',
            'estado' => 'required|string',
        ], [
            'tipo_membresia_id.required' => 'Selecciona un tipo de membresía.',
            'tipo_membresia_id.exists' => 'El tipo de membresía no es válido.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'duracion.required' => 'Debes ingresar una duración.',
            'duracion.integer' => 'La duración debe ser un número entero.',
            'estado.required' => 'Selecciona un estado para la membresía.',
        ]);

        $membresia = Membresias::create($validated);

        $membresia->opcionesDeAcceso()->sync($request->input('accesos', []));

        return $this->redirectForRole('membresias.index', 'Membresía creada exitosamente.');
    }

    public function show(Membresias $membresia)
    {
        return $this->getViewForRole('membresias.show', compact('membresia'));
    }

    public function edit(Membresias $membresia)
    {
        $tiposMembresia = TipoDeMembresia::all();
        $accesos = OpcionDeAcceso::all();

        return $this->getViewForRole('membresias.edit', compact('membresia', 'tiposMembresia', 'accesos'));
    }

    public function update(Request $request, Membresias $membresia)
    {
        $validated = $request->validate([
            'tipo_membresia_id' => 'required|exists:tipos_de_membresia,id',
            'precio' => 'required|numeric',
            'duracion' => 'required|integer',
            'estado' => 'required|string',
        ], [
            'tipo_membresia_id.required' => 'Selecciona un tipo de membresía.',
            'tipo_membresia_id.exists' => 'El tipo de membresía no es válido.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'duracion.required' => 'Debes ingresar una duración.',
            'duracion.integer' => 'La duración debe ser un número entero.',
            'estado.required' => 'Selecciona un estado para la membresía.',
        ]);

        $membresia->update($validated);
        $membresia->opcionesDeAcceso()->sync($request->input('accesos', []));

        return $this->redirectForRole('membresias.index', 'Membresía actualizada exitosamente.');
    }

    public function destroy(Membresias $membresia)
    {
        $membresia->delete();

        return $this->redirectForRole('membresias.index', 'Membresía eliminada exitosamente.');
    }
}
