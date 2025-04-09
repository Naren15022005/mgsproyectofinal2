<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracionController extends Controller
{
    /**
     * Mostrar el formulario de configuración
     */
    public function index()
    {
        $config = Configuracion::first();
        return view('admin.configuracion.index', compact('config'));
    }

    /**
     * Actualizar la configuración
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'site_favicon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'site_slogan' => 'nullable|string|max:255',
            'site_description' => 'nullable|string',
            'email_contact' => 'nullable|email|max:255',
            'phone_contact' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'business_hours' => 'nullable|string|max:255',
        ]);

        // Manejar checkboxes
        $validated['maintenance_mode'] = $request->has('maintenance_mode');
        $validated['dark_mode'] = $request->has('dark_mode');

        // Obtener o crear configuración
        $config = Configuracion::firstOrNew();

        // Manejo de archivos
        foreach (['site_logo', 'site_favicon'] as $field) {
            if ($request->hasFile($field)) {
                // Eliminar archivo anterior
                if ($config->$field) {
                    Storage::disk('public')->delete($config->$field);
                }
                // Guardar nuevo archivo
                $validated[$field] = $request->file($field)->store(
                    $field === 'site_logo' ? 'logos' : 'favicons',
                    'public'
                );
            } elseif (!$config->exists) {
                $validated[$field] = null;
            }
        }

        $config->fill($validated);
        $config->save();

        return redirect()->route('admin.configuracion.index')
            ->with('success', 'Configuración actualizada correctamente');
    }
}