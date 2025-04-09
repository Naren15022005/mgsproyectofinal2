<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membresias extends Model
{
    use HasFactory;

    protected $table = 'membresias';
    
    protected $fillable = [
        'tipo_membresia_id',
        'precio',
        'duracion',
        'estado'
    ];

    public function tipoMembresia()
    {
        return $this->belongsTo(TipoDeMembresia::class, 'tipo_membresia_id');
    }

    public function opcionesDeAcceso()
    {
        return $this->belongsToMany(OpcionDeAcceso::class, 'membresia_acceso', 'membresia_id', 'acceso_id');
    }
}