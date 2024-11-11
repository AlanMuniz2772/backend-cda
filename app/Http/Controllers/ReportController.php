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

    public function ventasPorMes()
    {
        $ventasMensuales = DB::table('productos')
            ->join('productos_ordenes', 'productos.id', '=', 'productos_ordenes.id_producto')
            ->join('orden_venta', 'orden_venta.id', '=', 'productos_ordenes.id_orden')
            ->select(
                'productos.nombre as mes',
                DB::raw('SUM(CASE WHEN MONTH(orden_venta.fecha) = 1 THEN productos_ordenes.cantidad_producto * productos_ordenes.precio ELSE 0 END) AS enero'),
                DB::raw('SUM(CASE WHEN MONTH(orden_venta.fecha) = 2 THEN productos_ordenes.cantidad_producto * productos_ordenes.precio ELSE 0 END) AS febrero'),
                DB::raw('SUM(CASE WHEN MONTH(orden_venta.fecha) = 3 THEN productos_ordenes.cantidad_producto * productos_ordenes.precio ELSE 0 END) AS marzo'),
                DB::raw('SUM(CASE WHEN MONTH(orden_venta.fecha) = 4 THEN productos_ordenes.cantidad_producto * productos_ordenes.precio ELSE 0 END) AS abril'),
                DB::raw('SUM(CASE WHEN MONTH(orden_venta.fecha) = 5 THEN productos_ordenes.cantidad_producto * productos_ordenes.precio ELSE 0 END) AS mayo'),
                DB::raw('SUM(CASE WHEN MONTH(orden_venta.fecha) = 6 THEN productos_ordenes.cantidad_producto * productos_ordenes.precio ELSE 0 END) AS junio'),
                DB::raw('SUM(CASE WHEN MONTH(orden_venta.fecha) = 7 THEN productos_ordenes.cantidad_producto * productos_ordenes.precio ELSE 0 END) AS julio'),
                DB::raw('SUM(CASE WHEN MONTH(orden_venta.fecha) = 8 THEN productos_ordenes.cantidad_producto * productos_ordenes.precio ELSE 0 END) AS agosto'),
                DB::raw('SUM(CASE WHEN MONTH(orden_venta.fecha) = 9 THEN productos_ordenes.cantidad_producto * productos_ordenes.precio ELSE 0 END) AS septiembre'),
                DB::raw('SUM(CASE WHEN MONTH(orden_venta.fecha) = 10 THEN productos_ordenes.cantidad_producto * productos_ordenes.precio ELSE 0 END) AS octubre'),
                DB::raw('SUM(CASE WHEN MONTH(orden_venta.fecha) = 11 THEN productos_ordenes.cantidad_producto * productos_ordenes.precio ELSE 0 END) AS noviembre'),
                DB::raw('SUM(CASE WHEN MONTH(orden_venta.fecha) = 12 THEN productos_ordenes.cantidad_producto * productos_ordenes.precio ELSE 0 END) AS diciembre')
            )
            ->groupBy('productos.id', 'productos.nombre')
            ->orderBy('productos.nombre', 'asc')
            ->get();

        // Retorna los datos en formato JSON
        return response()->json(['ventasMensuales' => $ventasMensuales]);
    }
}
