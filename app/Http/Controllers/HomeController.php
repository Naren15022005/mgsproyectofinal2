<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlujosIEs;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Venta;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Totales
        $totalIngresos = FlujosIEs::where('tipo', 'ingreso')->sum('monto');
        $totalEgresos = FlujosIEs::where('tipo', 'egreso')->sum('monto');
        $totalProductos = Producto::count();
        $totalClientes = Cliente::count();
    
        // Clientes recientes
        $clientesRecientes = Cliente::orderBy('created_at', 'desc')->take(5)->get();
    
        // Datos para el gráfico
        $datosFinancieros = FlujosIEs::selectRaw('
                YEAR(fecha) as año, 
                SUM(CASE WHEN tipo = "ingreso" THEN monto ELSE 0 END) as ingresos,
                SUM(CASE WHEN tipo = "egreso" THEN monto ELSE 0 END) as egresos
            ')
            ->groupBy('año')
            ->orderBy('año', 'asc')
            ->get()
            ->map(function ($item) {
                return [
                    'año' => (string)$item->año,
                    'ingresos' => (float)$item->ingresos,
                    'egresos' => (float)$item->egresos
                ];
            });

        return view('home', compact(
            'totalIngresos',
            'totalEgresos',
            'totalProductos',
            'totalClientes',
            'clientesRecientes',
            'datosFinancieros'
        ));
    }
}