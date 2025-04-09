<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clientes,email,' . $this->route('cliente'),
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:10',
        ];
    }
}