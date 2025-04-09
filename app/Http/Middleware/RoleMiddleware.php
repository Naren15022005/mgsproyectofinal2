<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login2');
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            if ($user->role === 'recepcionista') {
                return redirect('/recepcionista');
            } elseif ($user->role === 'administrador') {
                return redirect('/'); // Redirige al administrador a la vista principal
            } else {
                abort(403, 'Unauthorized action.');
            }
        }

        return $next($request);
    }
}