<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\CategoriaFlujo;
use App\Models\FlujosIEs;
use App\Models\CategoriaProducto;
use App\Models\Membresias;

class RecepcionistaController extends Controller
{
    public function dashboard()
    {
        // Lógica específica para el dashboard del recepcionista
        return view('recepcionista.dashboard');
    }

    // Métodos para manejar clientes
    public function indexClientes()
    {
        $clientes = Cliente::all();
        return view('recepcionista.clientes.index', compact('clientes'));
    }

    public function createCliente()
    {
        return view('recepcionista.clientes.create');
    }

    public function storeCliente(Request $request)
    {
        Cliente::create($request->all());
        return redirect()->route('recepcionista.clientes.index')->with('success', 'Cliente agregado correctamente.');
    }

    public function editCliente($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('recepcionista.clientes.edit', compact('cliente'));
    }

    public function updateCliente(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect()->route('recepcionista.clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroyCliente($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('recepcionista.clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }

    // Métodos para manejar productos
    public function indexProductos()
    {
        $productos = Producto::all();
        return view('recepcionista.productos.index', compact('productos'));
    }

    public function createProducto()
    {
        return view('recepcionista.productos.create');
    }

    public function storeProducto(Request $request)
    {
        Producto::create($request->all());
        return redirect()->route('recepcionista.productos.index')->with('success', 'Producto agregado correctamente.');
    }

    public function editProducto($id)
    {
        $producto = Producto::findOrFail($id);
        return view('recepcionista.productos.edit', compact('producto'));
    }

    public function updateProducto(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return redirect()->route('recepcionista.productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroyProducto($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('recepcionista.productos.index')->with('success', 'Producto eliminado correctamente.');
    }

    // Métodos para manejar categorías de flujos
    public function indexCategoriasFlujos()
    {
        $categorias = CategoriaFlujo::all();
        return view('recepcionista.categorias_flujos.index', compact('categorias'));
    }

    public function createCategoriaFlujo()
    {
        return view('recepcionista.categorias_flujos.create');
    }

    public function storeCategoriaFlujo(Request $request)
    {
        CategoriaFlujo::create($request->all());
        return redirect()->route('recepcionista.categorias_flujos.index')->with('success', 'Categoría de flujo agregada correctamente.');
    }

    public function editCategoriaFlujo($id)
    {
        $categoria = CategoriaFlujo::findOrFail($id);
        return view('recepcionista.categorias_flujos.edit', compact('categoria'));
    }

    public function updateCategoriaFlujo(Request $request, $id)
    {
        $categoria = CategoriaFlujo::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->route('recepcionista.categorias_flujos.index')->with('success', 'Categoría de flujo actualizada correctamente.');
    }

    public function destroyCategoriaFlujo($id)
    {
        $categoria = CategoriaFlujo::findOrFail($id);
        $categoria->delete();
        return redirect()->route('recepcionista.categorias_flujos.index')->with('success', 'Categoría de flujo eliminada correctamente.');
    }

    // Métodos para manejar flujos
    public function indexFlujos()
    {
        $flujos = FlujosIEs::all();
        return view('recepcionista.flujos.index', compact('flujos'));
    }

    public function createFlujo()
    {
        return view('recepcionista.flujos.create');
    }

    public function storeFlujo(Request $request)
    {
        FlujosIEs::create($request->all());
        return redirect()->route('recepcionista.flujos.index')->with('success', 'Flujo agregado correctamente.');
    }

    public function editFlujo($id)
    {
        $flujo = FlujosIEs::findOrFail($id);
        return view('recepcionista.flujos.edit', compact('flujo'));
    }

    public function updateFlujo(Request $request, $id)
    {
        $flujo = FlujosIEs::findOrFail($id);
        $flujo->update($request->all());
        return redirect()->route('recepcionista.flujos.index')->with('success', 'Flujo actualizado correctamente.');
    }

    public function destroyFlujo($id)
    {
        $flujo = FlujosIEs::findOrFail($id);
        $flujo->delete();
        return redirect()->route('recepcionista.flujos.index')->with('success', 'Flujo eliminado correctamente.');
    }

    // Métodos para manejar categorías de productos
    public function indexCategoriasProductos()
    {
        $categorias = CategoriaProducto::all();
        return view('recepcionista.categorias_productos.index', compact('categorias'));
    }

    public function createCategoriaProducto()
    {
        return view('recepcionista.categorias_productos.create');
    }

    public function storeCategoriaProducto(Request $request)
    {
        CategoriaProducto::create($request->all());
        return redirect()->route('recepcionista.categorias_productos.index')->with('success', 'Categoría de producto agregada correctamente.');
    }

    public function editCategoriaProducto($id)
    {
        $categoria = CategoriaProducto::findOrFail($id);
        return view('recepcionista.categorias_productos.edit', compact('categoria'));
    }

    public function updateCategoriaProducto(Request $request, $id)
    {
        $categoria = CategoriaProducto::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->route('recepcionista.categorias_productos.index')->with('success', 'Categoría de producto actualizada correctamente.');
    }

    public function destroyCategoriaProducto($id)
    {
        $categoria = CategoriaProducto::findOrFail($id);
        $categoria->delete();
        return redirect()->route('recepcionista.categorias_productos.index')->with('success', 'Categoría de producto eliminada correctamente.');
    }

    // Métodos para manejar membresías
    public function indexMembresias()
    {
        $membresias = Membresias::all();
        return view('recepcionista.membresias.index', compact('membresias'));
    }

    public function createMembresia()
    {
        return view('recepcionista.membresias.create');
    }

    public function storeMembresia(Request $request)
    {
        Membresias::create($request->all());
        return redirect()->route('recepcionista.membresias.index')->with('success', 'Membresía agregada correctamente.');
    }

    public function editMembresia($id)
    {
        $membresia = Membresias::findOrFail($id);
        return view('recepcionista.membresias.edit', compact('membresia'));
    }

    public function updateMembresia(Request $request, $id)
    {
        $membresia = Membresias::findOrFail($id);
        $membresia->update($request->all());
        return redirect()->route('recepcionista.membresias.index')->with('success', 'Membresía actualizada correctamente.');
    }

    public function destroyMembresia($id)
    {
        $membresia = Membresias::findOrFail($id);
        $membresia->delete();
        return redirect()->route('recepcionista.membresias.index')->with('success', 'Membresía eliminada correctamente.');
    }
}