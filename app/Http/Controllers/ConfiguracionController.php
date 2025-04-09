<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $config = Configuracion::firstOrNew();
        return view('admin.configuracion.index', compact('config'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'site_favicon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'site_slogan' => 'nullable|string|max:255',
            'email_contact' => 'nullable|email|max:255',
            'phone_contact' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'business_hours' => 'nullable|string|max:255',
            'social_facebook' => 'nullable|url|max:255',
            'primary_color' => 'nullable|string|max:20',
            'accent_color' => 'nullable|string|max:20',
            'sidebar_color' => 'nullable|string|max:20',
            'sidebar_text_color' => 'nullable|string|max:20',
            'maintenance_mode' => 'nullable|boolean',
            'dark_mode' => 'nullable|boolean'
        ]);

        $config = Configuracion::firstOrNew();

        foreach (['site_logo', 'site_favicon'] as $field) {
            if ($request->hasFile($field)) {
                if ($config->$field) {
                    Storage::disk('public')->delete($config->$field);
                }
                $validated[$field] = $request->file($field)->store(
                    $field === 'site_logo' ? 'logos' : 'favicons',
                    'public'
                );
            }
        }

        $config->fill($validated);
        $config->save();

        // Reiniciar la caché para aplicar cambios inmediatamente
        cache()->forget('global_config');
        
        return redirect()->route('admin.configuracion.index')
            ->with('success', 'Configuración actualizada correctamente');
    }

    public function reset()
    {
        $config = Configuracion::first();

        if ($config) {
            foreach (['site_logo', 'site_favicon'] as $field) {
                if ($config->$field && Storage::disk('public')->exists($config->$field)) {
                    Storage::disk('public')->delete($config->$field);
                }
            }
            $config->delete();
        }

        // Crear nueva configuración con valores por defecto
        Configuracion::create([
            'site_name' => 'Muscle Gym Sport',
            'primary_color' => '#2A2F35',
            'accent_color' => '#00C9A7',
            'sidebar_color' => '#2A2F35',
            'sidebar_text_color' => '#FFFFFF',
            'business_hours' => 'Lun-Vie 8:00 AM - 8:00 PM'
        ]);

        // Reiniciar la caché para aplicar cambios inmediatamente
        cache()->forget('global_config');

        return redirect()->route('admin.configuracion.index')
            ->with('success', 'Configuración restablecida exitosamente');
    }
}