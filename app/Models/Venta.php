<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'cliente_id',
        'cantidad',
        'precio_total',
        'fecha_venta',
        'descripcion',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}