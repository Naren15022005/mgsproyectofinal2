<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoMembresia extends Model
{
    use HasFactory;

    protected $table = 'estados_membresia';

    protected $fillable = [
        'nombre',
    ];

    public function clientesRegistrados()
    {
        return $this->hasMany(ClientesRegistrados::class);
    }
}