<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRegistradosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cliente_id' => 'required|exists:clientes,id',
            'user_id' => 'required|exists:users,id',
            'membresia_id' => 'required|exists:membresias,id',
            'tipo_membresia_id' => 'required|exists:tipos_de_membresia,id',
            'fecha_inicio' => 'required|date',
            'duracion' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'cliente_id.required' => 'El campo cliente es obligatorio.',
            'user_id.required' => 'El campo usuario es obligatorio.',
            'membresia_id.required' => 'El campo membresía es obligatorio.',
            'tipo_membresia_id.required' => 'El campo tipo de membresía es obligatorio.',
            'fecha_inicio.required' => 'El campo fecha de inicio es obligatorio.',
            'duracion.required' => 'El campo duración es obligatorio.',
        ];
    }
}