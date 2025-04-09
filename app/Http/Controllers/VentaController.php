<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        return view('ventas.create', compact('productos', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cliente_id' => 'nullable|exists:clientes,id',
            'cantidad' => 'required|integer',
            'precio_total' => 'required|numeric',
            'fecha_venta' => 'required|date',
            'descripcion' => 'nullable|string',
        ]);

        Venta::create($request->all());

        return redirect()->route('ventas.index')->with('success', 'Venta registrada exitosamente.');
    }
}