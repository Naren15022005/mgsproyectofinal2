<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Membresias;
use App\Models\TipoDeMembresia;
use App\Models\ClientesRegistrados;
use App\Http\Requests\ClientesRegistradosRequest;

class ClientesRegistradosController extends Controller
{
    public function index()
    {
        $clientesRegistrados = ClientesRegistrados::all();
        return view('admin.clientes_registrados.index', compact('clientesRegistrados'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $users = User::all();
        $membresias = Membresias::all();
        $tiposMembresia = TipoDeMembresia::all();
        return view('admin.clientes_registrados.create', compact('clientes', 'users', 'membresias', 'tiposMembresia'));
    }

    public function store(ClientesRegistradosRequest $request)
    {
        ClientesRegistrados::create($request->validated());
        return redirect()->route('admin.clientes_registrados.index')->with('success', 'Cliente registrado correctamente.');
    }

    public function edit($id)
    {
        $clientesRegistrados = ClientesRegistrados::findOrFail($id);
        return view('admin.clientes_registrados.edit', compact('clientesRegistrados'));
    }

    public function update(ClientesRegistradosRequest $request, $id)
    {
        $clientesRegistrados = ClientesRegistrados::findOrFail($id);
        $clientesRegistrados->update($request->validated());
        return redirect()->route('admin.clientes_registrados.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $clientesRegistrados = ClientesRegistrados::findOrFail($id);
        $clientesRegistrados->delete();
        return redirect()->route('admin.clientes_registrados.index')->with('success', 'Cliente eliminado correctamente.');
    }
}