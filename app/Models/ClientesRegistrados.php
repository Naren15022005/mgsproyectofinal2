<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesRegistrados extends Model
{
    use HasFactory;

    protected $table = 'clientes_registrados';

    protected $fillable = [
        'cliente_id',
        'user_id',
        'membresia_id',
        'tipo_membresia_id',
        'fecha_inicio',
        'duracion',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function membresia()
    {
        return $this->belongsTo(Membresia::class);
    }

    public function tipoMembresia()
    {
        return $this->belongsTo(TipoDeMembresia::class);
    }

    public function getAsistenciaAttribute()
    {
        return $this->membresia->asistencia;
    }
}