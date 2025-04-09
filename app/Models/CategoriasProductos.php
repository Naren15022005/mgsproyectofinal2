<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasProductos extends Model
{
    use HasFactory;

    protected $table = 'categorias_productos'; // Nombre correcto de la tabla

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}