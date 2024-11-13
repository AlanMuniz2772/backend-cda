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
    
}
