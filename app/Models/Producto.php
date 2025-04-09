<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'estado',
        'categoria_id',
        'imagen',
    ];

    /**
     * Obtener la categoría a la que pertenece este producto.
     */
    public function categoria()
    {
        return $this->belongsTo(CategoriasProductos::class, 'categoria_id');
    }

    /**
     * Accessor para obtener la URL completa de la imagen
     */
    public function getImagenUrlAttribute()
    {
        if ($this->imagen) {
            return asset('images/' . $this->imagen);
        }
        return null;
    }
}