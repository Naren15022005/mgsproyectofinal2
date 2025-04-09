<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use App\Models\CategoriasProductos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $categorias = CategoriasProductos::all();
        $user = auth()->user();

        if ($user->hasRole('administrador')) {
            return view('admin.productos.index', compact('productos', 'categorias'));
        } elseif ($user->hasRole('recepcionista')) {
            return view('recepcionista.productos.index', compact('productos', 'categorias'));
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        $productos = Producto::all()->map(function ($producto) {
            return [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'descripcion' => $producto->descripcion,
                'precio' => $producto->precio,
                'stock' => $producto->stock,
                'estado' => $producto->estado,
                'categoria_id' => $producto->categoria_id,
                'imagen' => $producto->imagen ? asset('images/' . $producto->imagen) : null,
                // Añade más campos si es necesario
            ];
        });
    
        return response()->json($productos);
    }

    public function create()
    {
        $categorias = CategoriasProductos::all();
        $user = auth()->user();

        if ($user->hasRole('administrador')) {
            return view('admin.productos.create', compact('categorias'));
        } elseif ($user->hasRole('recepcionista')) {
            return view('recepcionista.productos.create', compact('categorias'));
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    }

    public function store(ProductoRequest $request)
    {
        $imagename = null;
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            // Usar un nombre más único para evitar colisiones
            $imagename = Str::slug($request->nombre) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imagename);
        }

        $producto = new Producto([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'estado' => $request->estado,
            'categoria_id' => $request->categoria_id,
            'imagen' => $imagename,
        ]);

        $producto->save();

        $user = auth()->user();
        if ($user->hasRole('administrador')) {
            return redirect()->route('admin.productos.index')->with('success', 'Producto creado exitosamente.');
        } elseif ($user->hasRole('recepcionista')) {
            return redirect()->route('recepcionista.productos.index')->with('success', 'Producto creado exitosamente.');
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = CategoriasProductos::all();
        $user = auth()->user();

        if ($user->hasRole('administrador')) {
            return view('admin.productos.edit', compact('producto', 'categorias'));
        } elseif ($user->hasRole('recepcionista')) {
            return view('recepcionista.productos.edit', compact('producto', 'categorias'));
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    }

    public function update(ProductoRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $imagename = $producto->imagen;
        if ($request->hasFile('imagen')) {
            // Si hay una imagen anterior, eliminarla
            if ($producto->imagen && file_exists(public_path('images/' . $producto->imagen))) {
                unlink(public_path('images/' . $producto->imagen));
            }
            
            $image = $request->file('imagen');
            $imagename = Str::slug($request->nombre) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imagename);
        }

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'estado' => $request->estado,
            'categoria_id' => $request->categoria_id,
            'imagen' => $imagename,
        ]);

        $user = auth()->user();
        if ($user->hasRole('administrador')) {
            return redirect()->route('admin.productos.index')->with('success', 'Producto actualizado exitosamente.');
        } elseif ($user->hasRole('recepcionista')) {
            return redirect()->route('recepcionista.productos.index')->with('success', 'Producto actualizado exitosamente.');
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        if ($producto->imagen && file_exists(public_path('images/' . $producto->imagen))) {
            unlink(public_path('images/' . $producto->imagen));
        }
        $producto->delete();

        $user = auth()->user();
        if ($user->hasRole('administrador')) {
            return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado exitosamente.');
        } elseif ($user->hasRole('recepcionista')) {
            return redirect()->route('recepcionista.productos.index')->with('success', 'Producto eliminado exitosamente.');
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    }

    public function reducirStock(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        try {
            DB::beginTransaction();

            $producto = Producto::findOrFail($id);
            
            // Verificar si hay suficiente stock
            if ($producto->stock < $request->cantidad) {
                return response()->json([
                    'message' => 'No hay suficiente stock disponible'
                ], 400);
            }

            // Reducir stock
            $producto->stock -= $request->cantidad;
            $producto->save();

            DB::commit();

            return response()->json([
                'message' => 'Stock actualizado correctamente',
                'producto' => $producto
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error al actualizar el stock',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}