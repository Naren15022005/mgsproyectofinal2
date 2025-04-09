<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaFlujosIEs extends Model
{
    use HasFactory;

    protected $table = 'categoria_flujos_i_es';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function flujos()
    {
        return $this->hasMany(FlujosIEs::class, 'categoria_id');
    }
}