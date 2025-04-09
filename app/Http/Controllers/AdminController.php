<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\CategoriaFlujo;
use App\Models\FlujosIEs;
use App\Models\Personal;
use App\Models\User;
use App\Models\Membresias;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function getPermissions() {
        $role = Role::where('name', 'administrador')->first(); 
        $permissions = $role ? $role->permissions : collect(); 
        return view('admin.permissions.index', compact('permissions')); 
    }


    // Métodos para Clientes
    public function indexClientes()
    {
        $clientes = Cliente::all();
        return view('admin.clientes.index', compact('clientes'));
    }

    public function createCliente()
    {
        return view('admin.clientes.create');
    }

    public function storeCliente(Request $request)
    {
        Cliente::create($request->all());
        return redirect()->route('admin.clientes.index')->with('success', 'Cliente agregado correctamente.');
    }

    public function editCliente($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('admin.clientes.edit', compact('cliente'));
    }

    public function updateCliente(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect()->route('admin.clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroyCliente($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('admin.clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }

    // Métodos para Productos
    public function indexProductos()
    {
        $productos = Producto::all();
        return view('admin.productos.index', compact('productos'));
    }

    public function createProducto()
    {
        return view('admin.productos.create');
    }

    public function storeProducto(Request $request)
    {
        Producto::create($request->all());
        return redirect()->route('admin.productos.index')->with('success', 'Producto agregado correctamente.');
    }

    public function editProducto($id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.productos.edit', compact('producto'));
    }

    public function updateProducto(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return redirect()->route('admin.productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroyProducto($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado correctamente.');
    }

    // Métodos para Categorías de Flujos
    public function indexCategoriasFlujos()
    {
        $categorias = CategoriaFlujo::all();
        return view('admin.categorias_flujos.index', compact('categorias'));
    }

    public function createCategoriaFlujo()
    {
        return view('admin.categorias_flujos.create');
    }

    public function storeCategoriaFlujo(Request $request)
    {
        CategoriaFlujo::create($request->all());
        return redirect()->route('admin.categorias_flujos.index')->with('success', 'Categoría de flujo agregada correctamente.');
    }

    public function editCategoriaFlujo($id)
    {
        $categoria = CategoriaFlujo::findOrFail($id);
        return view('admin.categorias_flujos.edit', compact('categoria'));
    }

    public function updateCategoriaFlujo(Request $request, $id)
    {
        $categoria = CategoriaFlujo::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->route('admin.categorias_flujos.index')->with('success', 'Categoría de flujo actualizada correctamente.');
    }

    public function destroyCategoriaFlujo($id)
    {
        $categoria = CategoriaFlujo::findOrFail($id);
        $categoria->delete();
        return redirect()->route('admin.categorias_flujos.index')->with('success', 'Categoría de flujo eliminada correctamente.');
    }

    // Métodos para Flujos
    public function indexFlujos()
    {
        $flujos = FlujosIEs::all();
        return view('admin.flujos.index', compact('flujos'));
    }

    public function createFlujo()
    {
        return view('admin.flujos.create');
    }

    public function storeFlujo(Request $request)
    {
        Flujo::create($request->all());
        return redirect()->route('admin.flujos.index')->with('success', 'Flujo agregado correctamente.');
    }

    public function editFlujo($id)
    {
        $flujo = FlujosIEs::findOrFail($id);
        return view('admin.flujos.edit', compact('flujo'));
    }

    public function updateFlujo(Request $request, $id)
    {
        $flujo = FlujosIEs::findOrFail($id);
        $flujo->update($request->all());
        return redirect()->route('admin.flujos.index')->with('success', 'Flujo actualizado correctamente.');
    }

    public function destroyFlujo($id)
    {
        $flujo = FlujosIEs::findOrFail($id);
        $flujo->delete();
        return redirect()->route('admin.flujos.index')->with('success', 'Flujo eliminado correctamente.');
    }

    // Métodos para Personal
    public function indexPersonal()
    {
        $personal = Personal::all();
        return view('admin.personal.index', compact('personal'));
    }

    public function createPersonal()
    {
        return view('admin.personal.create');
    }

    public function storePersonal(Request $request)
    {
        Personal::create($request->all());
        return redirect()->route('admin.personal.index')->with('success', 'Personal agregado correctamente.');
    }


    public function editPersonal($id)
    {
        $personal = Personal::findOrFail($id);
        return view('admin.personal.edit', compact('personal'));
    }

    public function updatePersonal(Request $request, $id)
    {
        $personal = Personal::findOrFail($id);
        $personal->update($request->all());
        return redirect()->route('admin.personal.index')->with('success', 'Personal actualizado correctamente.');
    }


    public function destroyPersonal($id)
    {
        $personal = Personal::findOrFail($id);
        $personal->delete();
        return redirect()->route('admin.personal.index')->with('success', 'Personal eliminado correctamente.');
    }

    public function indexUsers()
    {
        $users = Users::all();
        return view('admin.users.index', compact('users'));
        
    }

    public function createUsers (){
        return view('admin.users.create');

    }

    
    public function storeUsers(Request $request)
    {
        $users= Users::all();
        return redirect()->route('admin.users.index')->with('success', 'Usuario Registrado exitosamente.');
    }

    public function editUsers($id)
    {
        $users= Users::all();
        return view('admin.users.index', compact('users'));
    }
    public function update(Request $request, $id)
    {
        $users = Users::findOrFail($id);
        $users->update($request->all());
        $users->syncRoles([$role]);

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado y rol asignado correctamente.');
    }

    public function destroy($id)
    {
        $uses = Users::findOrFail($id);
        $users->delete();

        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente.');
    }


    public function indexMembresias (){
        $membrerias = Membresias::all();
        return view('admin.membresias.index', compact('membresias'));
    }

 
}