<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function ventasPorDia()
    {
        // Consulta para agrupar las ventas diarias
        $ventasPorDia = DB::table('orden_venta')
            ->join('productos_ordenes', 'orden_venta.id', '=', 'productos_ordenes.id_orden')
            ->select(
                DB::raw('DATE(orden_venta.fecha) as fecha'),
                DB::raw('COUNT(DISTINCT orden_venta.id) as numeroVentas'),
                DB::raw('SUM(productos_ordenes.precio * productos_ordenes.cantidad_producto) as totalVendido')
            )
            ->groupBy(DB::raw('DATE(orden_venta.fecha)'))
            ->orderBy('fecha', 'asc')
            ->get();

        // Retorna los datos en formato JSON
        return response()->json(['ventasPorDia' => $ventasPorDia]);
    }

    public function productosMasVendidos()
    {
        // Consulta para obtener los productos más vendidos
        $productosMasVendidos = DB::table('productos_ordenes')
            ->join('productos', 'productos_ordenes.id_producto', '=', 'productos.id')
            ->select(
                'productos.nombre',
                DB::raw('SUM(productos_ordenes.cantidad_producto) as cantidadVendida')
            )
            ->groupBy('productos.id', 'productos.nombre')
            ->orderBy('cantidadVendida', 'desc')
            ->limit(10)
            ->get();
        
        // Retorna los datos en formato JSON
        return response()->json(['productosMasVendidos' => $productosMasVendidos]);
    }
}
