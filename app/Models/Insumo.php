<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $table = 'insumos';

    protected $fillable = [
        'id_tienda',
        'nombre',
        'costo',
        'cantidad_tienda',
        'cantidad_captura',
        'unidad_medida',
        'is_available',
    ];
}