<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'user_id',
        'nombre', 
        'apellido',
        'email',
        'telefono', 
        'direccion',
        'fecha_nacimiento',
        'genero',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}