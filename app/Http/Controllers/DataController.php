<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function productos()
    {
        // Consulta para obtener los productos
        $productos = DB::table('productos')
            ->select(
                'productos.id',
                'productos.nombre',
                'productos.costo',
                'productos.precio',
            )
            ->get();

        return response()->json(['productos' => $productos]);
    }

    public function inventarios()
    {
        // Consulta para obtener los inventarios
        $inventarios = DB::table('inventarios')
            ->select(
                'inventarios.id',
                'inventarios.fecha',
            )
            ->get();

        return response()->json(['inventarios' => $inventarios]);
    }

    public function insumos()
    {
        // Consulta para obtener los insumos
        $insumos = DB::table('insumos')
            ->select(
                'insumos.id',
                'insumos.nombre',
                'insumos.costo',
                'insumos.cantidad_tienda',
                'insumos.cantidad_captura',
                'insumos.unidad_medida',
                'insumos.is_available',
            )
            ->get();

        return response()->json(['insumos' => $insumos]);
    }
    
    public function insumosProductos()
    {
        // Consulta para obtener los insumos de los productos
        $insumosProductos = DB::table('insumos_productos')
            ->select(
                'insumos_productos.id',
                'insumos_productos.id_insumo',
                'insumos_productos.id_producto',
                'insumos_productos.cantidad',
            )
            ->get();

        return response()->json(['insumosProductos' => $insumosProductos]);
    }
}
