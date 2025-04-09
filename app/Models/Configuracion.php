<?php
// filepath: c:\Users\Naren\OneDrive\Escritorio\mgsproyectofinal2\app\Models\Configuracion.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_logo',
        'site_favicon',
        'site_slogan',
        'site_description',
        'email_contact',
        'phone_contact',
        'address',
        'business_hours',
        'maintenance_mode',
        'dark_mode',
    ];
}