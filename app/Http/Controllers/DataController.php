<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function productos()
    {
        // Consulta para obtener los productos con sus insumos relacionados
        $productos = DB::table('productos')
            ->select(
                'productos.id',
                'productos.nombre',
                'productos.costo',
                'productos.utilidad',
                'productos.precio',
                'productos.is_available'
            )
            ->get()
            ->map(function ($producto) {
                // Obtener los insumos relacionados con el producto actual
                $insumos = DB::table('insumos_productos')
                    ->join('insumos', 'insumos.id', '=', 'insumos_productos.id_insumo')
                    ->where('insumos_productos.id_producto', $producto->id)
                    ->select(
                        'insumos.id',
                        'insumos.nombre',
                        'insumos_productos.cantidad',
                        'insumos.unidad_medida'
                    )
                    ->get();

                // Agregar la lista de insumos al producto
                $producto->insumos = $insumos;

                return $producto;
            });

        // Retornar los productos con sus insumos como JSON
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

    public function users()
    {
        // Consulta para obtener los usuarios que no son propietarios
        $users = DB::table('users')
            ->select(
                'users.id',
                'users.name',
                'users.rol_operacion',
                'users.sueldo_semanal',
                'users.bono_semanal',
                'users.horas_trabajadas',
            )
            ->where('users.is_owner', false)
            ->get();

        return response()->json(['users' => $users]);
    }
}
