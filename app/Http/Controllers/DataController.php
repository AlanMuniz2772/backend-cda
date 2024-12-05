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
    // Obtener los inventarios con sus insumos
    $inventarios = DB::table('inventarios')
        ->select('inventarios.id', 'inventarios.fecha')
        ->orderBy('inventarios.fecha', 'desc') // Ordenar por fecha más reciente
        ->get()
        ->map(function ($inventario) {
            // Obtener los insumos relacionados al inventario
            $insumos = DB::table('insumos_inventario')
                ->join('insumos', 'insumos.id', '=', 'insumos_inventario.id_insumo')
                ->where('insumos_inventario.id_inventario', $inventario->id)
                ->select(
                    'insumos.costo',
                    'insumos_inventario.cantidad_tienda',
                    'insumos_inventario.cantidad_captura'
                )
                ->get();

            // Calcular varianza monetaria
            $varianzaMonetaria = $insumos->sum(function ($insumo) {
                $diferencia = $insumo->cantidad_captura - $insumo->cantidad_tienda;
                return $diferencia * $insumo->costo;
            });

            // Calcular el costo total del inventario
            $costoTotal = $insumos->sum(function ($insumo) {
                return $insumo->cantidad_tienda * $insumo->costo;
            });

            // Calcular varianza porcentual
            $varianzaPorcentual = $costoTotal > 0 ? ($varianzaMonetaria / $costoTotal) * 100 : 0;

            // Agregar los cálculos al inventario
            $inventario->varianza_monetaria = round($varianzaMonetaria, 2);
            $inventario->varianza_porcentual = round($varianzaPorcentual, 2);

            return $inventario;
        });

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
            ->orderBy('insumos.updated_at', 'desc') // Ordenar por fecha más reciente
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

    public function ordenVenta()
{
    // Consulta para obtener las órdenes de venta registradas
    $ordenes = DB::table('orden_venta')
        ->join('productos_ordenes', 'orden_venta.id', '=', 'productos_ordenes.id_orden')
        ->select(
            'orden_venta.id',
            DB::raw('TIME(orden_venta.fecha) as hora'),
            DB::raw("
                CASE 
                    WHEN orden_venta.tipo_pago = 1 THEN 'Efectivo'
                    WHEN orden_venta.tipo_pago = 2 THEN 'Tarjeta de Crédito'
                    ELSE 'Otro'
                END as tipo_pago
            "),
            DB::raw('SUM(productos_ordenes.precio * productos_ordenes.cantidad_producto) as total')
        )
        ->where('orden_venta.is_registered', true) // Filtrar sólo registros con is_registered = true
        ->groupBy('orden_venta.id', 'orden_venta.fecha', 'orden_venta.tipo_pago') // Agrupar por orden
        ->orderBy('orden_venta.fecha', 'desc') // Ordenar por fecha más reciente
        ->get();

    return response()->json(['ordenes' => $ordenes]);
}

    
}
