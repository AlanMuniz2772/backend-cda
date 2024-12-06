<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'orden_venta';

    protected $fillable = [
        'id_tienda',
        'fecha',
        'tipo_pago',
        'is_registered'
    ];
}

