<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembresiasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tipo_membresia_id' => 'required|exists:tipos_de_membresia,id',
            'accesos' => 'nullable|array',
            'accesos.*' => 'exists:opciones_de_acceso,id',
            'precio' => 'required|numeric|min:0',
            'duracion' => 'required|integer|min:1',
            'estado' => 'required|in:activo,inactivo',
        ];
    }
}
