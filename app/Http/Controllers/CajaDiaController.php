<?php

namespace App\Http\Controllers;

use App\Models\CajaDia;
use App\Models\Producto; // Asegúrate de importar el modelo Producto
use App\Http\Requests\CajaDiaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class CajaDiaController extends Controller
{
    public function index()
    {
        $cajas = CajaDia::all();
        $productos = Producto::all(); // Obtén todos los productos desde la base de datos
        return view('Recepcionista.CajaDia.index', compact('cajas', 'productos'));
    }

    public function create()
    {
        return view('Recepcionista.CajaDia.create');
    }

    public function store(CajaDiaRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $validatedData['monto_inicial'] = 1000;
            $validatedData['saldo_total'] = $validatedData['monto_final'] - $validatedData['monto_inicial'];

            CajaDia::create($validatedData);

            return redirect()->route('recepcionista.caja_dia.index')->with('success', 'Caja del día creada correctamente');
        } catch (Exception $e) {
            Log::error('Error al crear la caja del día: ' . $e->getMessage());
            return back()->withErrors('Error al crear la caja del día')->withInput();
        }
    }

    public function show($id)
    {
        $caja = CajaDia::findOrFail($id);
        return view('Recepcionista.CajaDia.show', compact('caja'));
    }

    public function edit($id)
    {
        $caja = CajaDia::findOrFail($id);
        return view('Recepcionista.CajaDia.edit', compact('caja'));
    }

    public function update(CajaDiaRequest $request, $id)
    {
        try {
            $validatedData = $request->validated();

            $validatedData['saldo_total'] = $validatedData['monto_final'] - 1000;

            $caja = CajaDia::findOrFail($id);
            $caja->update($validatedData);

            return redirect()->route('recepcionista.caja_dia.index')->with('success', 'Caja del día actualizada correctamente');
        } catch (Exception $e) {
            Log::error('Error al actualizar la caja del día: ' . $e->getMessage());
            return back()->withErrors('Error al actualizar la caja del día')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $caja = CajaDia::findOrFail($id);
            $caja->delete();

            return redirect()->route('recepcionista.caja_dia.index')->with('success', 'Caja del día eliminada correctamente');
        } catch (Exception $e) {
            Log::error('Error al eliminar la caja del día: ' . $e->getMessage());
            return redirect()->route('recepcionista.caja_dia.index')->with('error', 'Error al eliminar la caja del día');
        }
    }

    public function finalizarDia($id)
    {
        try {
            $caja = CajaDia::findOrFail($id);
            $flujo = new FlujosIEs();
            $flujo->fecha = $caja->fecha;
            $flujo->monto = $caja->saldo_total;
            $flujo->tipo = 'ingreso'; // Asumiendo que es un ingreso
            $flujo->usuario_id = auth()->user()->id;
            $flujo->save();

            return redirect()->route('recepcionista.caja_dia.index')->with('success', 'Caja del día finalizada y saldo movido a flujos');
        } catch (Exception $e) {
            Log::error('Error al finalizar el día: ' . $e->getMessage());
            return redirect()->route('recepcionista.caja_dia.index')->with('error', 'Error al finalizar el día');
        }
    }
}