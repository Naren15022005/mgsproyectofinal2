<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Configuracion;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Compartir configuración global con todas las vistas
        View::composer('*', function ($view) {
            $globalConfig = Configuracion::first();
            $view->with('globalConfig', $globalConfig);
        });
        
        header('Access-Control-Allow-Origin', 'http://localhost:3000');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization');
    }
}