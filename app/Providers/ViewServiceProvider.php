<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Configuracion;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Compartir la configuración con todas las vistas
        view()->composer('*', function ($view) {
            $config = Configuracion::firstOrNew();
            $view->with('globalConfig', $config);
        });
    }
}