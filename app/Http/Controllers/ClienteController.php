<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class ClienteController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('administrador')) {
            $clientes = Cliente::all();
            return view('admin.cliente.index', compact('clientes'));
        } elseif ($user->hasRole('recepcionista')) {
            $clientes = Cliente::all();
            return view('recepcionista.cliente.index', compact('clientes'));
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->hasRole('administrador')) {
            return view('admin.cliente.create');
        } elseif ($user->hasRole('recepcionista')) {
            return view('recepcionista.cliente.create');
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    }

    public function store(ClienteRequest $request)
    {
        try {
            // Validar los datos del formulario
            $validatedData = $request->validated();
    
            // Crear un nuevo cliente con los datos validados
            $cliente = Cliente::create($validatedData);
    
            // Redirigir con un mensaje de éxito
            $user = auth()->user();
            if ($user->hasRole('administrador')) {
                return redirect()->route('admin.cliente.index')->with('successMsg', 'El cliente se guardó exitosamente');
            } elseif ($user->hasRole('recepcionista')) {
                return redirect()->route('recepcionista.cliente.index')->with('successMsg', 'El cliente se guardó exitosamente');
            } else {
                abort(403, 'No tienes permiso para acceder a esta página.');
            }
        } catch (Exception $e) {
            // Registrar el error
            Log::error('Error al guardar el cliente: ' . $e->getMessage());
    
            // Redirigir con un mensaje de error
            return back()->withErrors('Error al guardar el cliente.')->withInput();
        }
    }

    public function show($id)
    {
        $user = auth()->user();
        $cliente = Cliente::findOrFail($id);
        if ($user->hasRole('administrador')) {
            return view('admin.cliente.show', compact('cliente'));
        } elseif ($user->hasRole('recepcionista')) {
            return view('recepcionista.cliente.show', compact('cliente'));
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    }

    public function edit($id)
    {
        $user = auth()->user();
        $cliente = Cliente::findOrFail($id);
        if ($user->hasRole('administrador')) {
            return view('admin.cliente.edit', compact('cliente'));
        } elseif ($user->hasRole('recepcionista')) {
            return view('recepcionista.cliente.edit', compact('cliente'));
        } else {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    }

    public function update(ClienteRequest $request, $id)
    {
        try {
            // Validar los datos del formulario
            $validatedData = $request->validated();
    
            // Encontrar el cliente y actualizarlo con los datos validados
            $cliente = Cliente::findOrFail($id);
            $cliente->update($validatedData);
    
            // Redirigir con un mensaje de éxito
            $user = auth()->user();
            if ($user->hasRole('administrador')) {
                return redirect()->route('admin.cliente.index')->with('success', 'Cliente actualizado correctamente');
            } elseif ($user->hasRole('recepcionista')) {
                return redirect()->route('recepcionista.cliente.index')->with('success', 'Cliente actualizado correctamente');
            } else {
                abort(403, 'No tienes permiso para acceder a esta página.');
            }
        } catch (Exception $e) {
            // Registrar el error
            Log::error('Error al actualizar el cliente: ' . $e->getMessage());
    
            // Redirigir con un mensaje de error
            return back()->withErrors('Error al actualizar el cliente.')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
            $user = auth()->user();
            if ($user->hasRole('administrador')) {
                return redirect()->route('admin.cliente.index')->with('success', 'Cliente eliminado correctamente');
            } elseif ($user->hasRole('recepcionista')) {
                return redirect()->route('recepcionista.cliente.index')->with('success', 'Cliente eliminado correctamente');
            } else {
                abort(403, 'No tienes permiso para acceder a esta página.');
            }
        } catch (Exception $e) {
            Log::error('Error al eliminar el cliente: ' . $e->getMessage());
            return redirect()->route('admin.cliente.index')->with('error', 'Error al eliminar el cliente');
        }
    }

    public function toggleEstado($id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->estado = !$cliente->estado;
            $cliente->save();
            $user = auth()->user();
            if ($user->hasRole('administrador')) {
                return redirect()->route('admin.cliente.index')->with('success', 'Estado del cliente actualizado correctamente');
            } elseif ($user->hasRole('recepcionista')) {
                return redirect()->route('recepcionista.cliente.index')->with('success', 'Estado del cliente actualizado correctamente');
            } else {
                abort(403, 'No tienes permiso para acceder a esta página.');
            }
        } catch (Exception $e) {
            Log::error('Error al actualizar el estado del cliente: ' . $e->getMessage());
            return redirect()->route('admin.cliente.index')->with('error', 'Error al actualizar el estado del cliente');
        }
    }
}