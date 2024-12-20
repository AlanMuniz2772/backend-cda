<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsumoProducto extends Model
{
    use HasFactory;

    protected $table = 'insumos_productos';

    protected $fillable = [
        'id_producto',
        'id_insumo',
        'cantidad',
    ];
}