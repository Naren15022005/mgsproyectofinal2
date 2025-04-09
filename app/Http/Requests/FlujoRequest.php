<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlujoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tipo' => 'required|string',
            'monto' => 'required|numeric',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'categoria_id' => 'required|exists:categoria_flujos_i_es,id',
            'usuario_id' => 'required|exists:users,id',
        ];
    }
}