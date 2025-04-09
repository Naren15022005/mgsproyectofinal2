<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlujosIEs extends Model
{
    use HasFactory;

    protected $table = 'flujos_i_es';

    protected $fillable = [
        'id',
        'tipo',
        'monto',
        'descripcion',
        'fecha',
        'categoria_id',
        'usuario_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaFlujosIEs::class, 'categoria_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}