<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login2', function (Request $request) {
    return response()->json([
        'token' => 'fake-token-123',
        'user' => ['name' => 'Usuario Prueba', 'email' => $request->email],
    ]);
});

// Nueva ruta GET con datos estáticos
Route::middleware('api')->get('/datos-estaticos', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Datos cargados correctamente',
        'data' => [
            'id' => 1,
            'nombre' => 'Producto de ejemplo',
            'precio' => 100.50,
            'disponible' => true
        ],
    ]);
});
