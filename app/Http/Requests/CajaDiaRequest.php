<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CajaDiaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fecha' => 'required|date|unique:caja_dia,fecha,' . $this->route('caja_dia'),
            'monto_final' => 'required|numeric',
        ];
    }
}