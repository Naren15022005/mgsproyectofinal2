<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeMembresia extends Model
{
    use HasFactory;

    protected $table = 'tipos_de_membresia';

    protected $fillable = ['nombre', 'descripcion', 'precio', 'duracion', 'estado'];

    public function opcionesDeAcceso()
    {
        return $this->belongsToMany(OpcionDeAcceso::class, 'membresia_opcion_acceso', 'membresia_id', 'opcion_acceso_id');
    }
}
