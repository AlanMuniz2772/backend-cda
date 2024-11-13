<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\InsumoProductoController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


//gets
Route::get('/reportes/ventas-por-dia', [ReportController::class, 'ventasPorDia']);
Route::get('/reportes/productos-mas-vendidos', [ReportController::class, 'productosMasVendidos']);
Route::get('/reportes/ventas-por-mes', [ReportController::class, 'ventasPorMes']);
Route::get('/data/productos', [DataController::class, 'productos']);
Route::get('/data/inventarios', [DataController::class, 'inventarios']);
Route::get('/data/insumos', [DataController::class, 'insumos']);
Route::get('/data/insumos-productos', [DataController::class, 'insumosProductos']);

//posts
Route::post('/insert/productos', [ProductoController::class, 'store']);
Route::post('/insert/insumos', [InsumoController::class, 'store']);
Route::post('/insert/insumos-productos', [InsumoProductoController::class, 'store']);
