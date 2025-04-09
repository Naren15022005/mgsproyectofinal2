<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // La contraseña será encriptada automáticamente por el modelo
            'role_id' => $request->role_id,
        ]);

        $role = Role::find($request->role_id);
        $user->assignRole($role);

        return redirect()->route('admin.users.index')->with('success', 'Usuario creado y rol asignado correctamente.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = $request->password; // La contraseña será encriptada automáticamente por el modelo
        }
        $user->role_id = $request->role_id;
        $user->save();

        $role = Role::find($request->role_id);
        $user->syncRoles([$role]);

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado y rol asignado correctamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente.');
    }

    public function assignRole(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $role = Role::findByName($request->role);
        
        $user->syncRoles([$role]);
        
        return redirect()->back()->with('success', 'Rol asignado correctamente');
    }
}