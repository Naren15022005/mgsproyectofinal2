<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MembresiasController;
use App\Http\Controllers\FlujoIEController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\ClientesRegistradosController;
use App\Http\Controllers\CategoriaFlujosIEController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\CajaDiaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductoApiController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/test', function () {
    return response()->json(['message' => 'Backend funcionando correctamente']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('api')->group(function () {
    Route::group(['middleware' => ['cors']], function () {
        Route::get('/productos', [ProductoAPIController::class, 'index']);
        Route::get('/productos/{id}', [ProductoAPIController::class, 'show']);
        Route::get('/productos/categoria/{categoriaId}', [ProductoAPIController::class, 'getByCategoria']);
    });
});

// Rutas para el administrador
Route::group([
    'middleware' => ['auth', 'role:administrador'],
    'as' => 'admin.',
    'prefix' => 'admin'
], function () {
    Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion.index');
    Route::put('/configuracion', [ConfiguracionController::class, 'update'])->name('configuracion.update');
    Route::delete('/configuracion/reset', [ConfiguracionController::class, 'reset'])->name('configuracion.reset');
    
    Route::resource('recepcionista', RecepcionistaController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('membresias', MembresiasController::class);
    Route::resource('flujos', FlujoIEController::class);
    Route::resource('cliente', ClienteController::class);
    Route::resource('users', UserController::class);
});

// Rutas para el recepcionista
Route::group([
    'middleware' => ['auth', 'role:recepcionista'],
    'as' => 'recepcionista.',
    'prefix' => 'recepcionista'
], function () {
    Route::get('/dashboard', [RecepcionistaController::class, 'dashboard'])->name('dashboard');
    Route::resource('clientes', ClienteController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('membresias', MembresiasController::class);
    Route::resource('flujos', FlujoIEController::class);
    Route::post('/flujos/store-from-pos', [FlujoIEController::class, 'storeFromPos'])
        ->name('flujos.store-from-pos');
    Route::resource('caja_dia', CajaDiaController::class);
});