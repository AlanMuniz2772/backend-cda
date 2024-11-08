<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DataController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/reportes/ventas-por-dia', [ReportController::class, 'ventasPorDia']);
Route::get('/reportes/productos-mas-vendidos', [ReportController::class, 'productosMasVendidos']);
Route::get('/data/productos', [DataController::class, 'productos']);

