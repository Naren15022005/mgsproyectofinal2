<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcionDeAcceso extends Model
{
    use HasFactory;

    protected $table = 'opciones_de_acceso';
    
    protected $fillable = ['nombre'];

    public function membresias()
    {
        return $this->belongsToMany(Membresias::class, 'membresia_acceso', 'acceso_id', 'membresia_id');
    }
}