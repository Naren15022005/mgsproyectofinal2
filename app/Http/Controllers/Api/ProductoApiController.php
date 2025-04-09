<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\CategoriasProductos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoAPIController extends Controller
{
    /**
     * Devuelve todos los productos activos con sus categorías.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Headers CORS para desarrollo
        
        try {
            $productos = Producto::with('categoria')
                ->where('estado', 1) // Solo productos activos
                ->get()
                ->map(function ($producto) {
                    return [
                        'id' => $producto->id,
                        'nombre' => $producto->nombre,
                        'descripcion' => $producto->descripcion,
                        'precio' => $producto->precio,
                        'stock' => $producto->stock,
                        'estado' => $producto->estado,
                        'categoria_id' => $producto->categoria_id,
                        'categoria_nombre' => $producto->categoria ? $producto->categoria->nombre : 'Sin categoría',
                        'imagen_url' => $this->getImageUrl($producto),
                        'created_at' => $producto->created_at,
                        'updated_at' => $producto->updated_at
                    ];
                });
            
            return response()->json([
                'success' => true,
                'data' => $productos,
                'message' => 'Productos obtenidos exitosamente'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener productos: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Devuelve un producto específico por ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Headers CORS para desarrollo
        
        try {
            $producto = Producto::with('categoria')->find($id);
            
            if (!$producto) {
                return response()->json([
                    'success' => false,
                    'message' => 'Producto no encontrado'
                ], 404);
            }

            $responseData = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'descripcion' => $producto->descripcion,
                'precio' => $producto->precio,
                'stock' => $producto->stock,
                'estado' => $producto->estado,
                'categoria_id' => $producto->categoria_id,
                'categoria_nombre' => $producto->categoria ? $producto->categoria->nombre : 'Sin categoría',
                'imagen_url' => $this->getImageUrl($producto),
                'created_at' => $producto->created_at,
                'updated_at' => $producto->updated_at
            ];

            return response()->json([
                'success' => true,
                'data' => $responseData,
                'message' => 'Producto obtenido exitosamente'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener producto: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Devuelve productos por categoría.
     *
     * @param  int  $categoriaId
     * @return \Illuminate\Http\Response
     */
    public function getByCategoria($categoriaId)
    {
        // Headers CORS para desarrollo
       
        
        try {
            $productos = Producto::with('categoria')
                ->where('categoria_id', $categoriaId)
                ->where('estado', 1)
                ->get()
                ->map(function ($producto) {
                    return [
                        'id' => $producto->id,
                        'nombre' => $producto->nombre,
                        'descripcion' => $producto->descripcion,
                        'precio' => $producto->precio,
                        'stock' => $producto->stock,
                        'estado' => $producto->estado,
                        'categoria_id' => $producto->categoria_id,
                        'categoria_nombre' => $producto->categoria ? $producto->categoria->nombre : 'Sin categoría',
                        'imagen_url' => $this->getImageUrl($producto),
                        'created_at' => $producto->created_at,
                        'updated_at' => $producto->updated_at
                    ];
                });
                
            return response()->json([
                'success' => true,
                'data' => $productos,
                'message' => 'Productos por categoría obtenidos exitosamente'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener productos por categoría: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtiene la URL completa de la imagen del producto
     * 
     * @param Producto $producto
     * @return string
     */
    private function getImageUrl(Producto $producto)
    {
        if (!$producto->imagen) {
            return asset('images/default-product.jpg');
        }

        // Verifica si la imagen es una URL completa (por ejemplo, de un servicio externo)
        if (filter_var($producto->imagen, FILTER_VALIDATE_URL)) {
            return $producto->imagen;
        }

        // Para imágenes almacenadas localmente
        if (Storage::disk('public')->exists('images/' . $producto->imagen)) {
            return asset('storage/images/' . $producto->imagen);
        }

        return asset('images/default-product.jpg');
    }

    /**
     * Maneja las solicitudes OPTIONS para CORS
     */
    public function options()
    {
        // Headers CORS para desarrollo
       
        header('Access-Control-Max-Age: 86400'); // 24 horas
        
        return response()->json([], 204);
    }

    /**
     * Reduce el stock de un producto
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function reducirStock(Request $request, $id)
    {
        // Headers CORS para desarrollo
       
        
        try {
            $request->validate([
                'cantidad' => 'required|integer|min:1'
            ]);

            $producto = Producto::findOrFail($id);
            
            if ($producto->stock < $request->cantidad) {
                return response()->json([
                    'success' => false,
                    'message' => 'No hay suficiente stock disponible'
                ], 400);
            }

            $producto->stock -= $request->cantidad;
            $producto->save();

            return response()->json([
                'success' => true,
                'data' => $producto,
                'message' => 'Stock actualizado correctamente'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el stock: ' . $e->getMessage()
            ], 500);
        }
    }
}