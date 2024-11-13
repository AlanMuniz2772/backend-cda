<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsumoProducto;
use Illuminate\Support\Facades\Validator;

class InsumoProductoController extends Controller
{
    public function store(Request $request)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'id_producto' => 'required|integer|exists:productos,id', 
            'id_insumo' => 'required|integer|exists:insumos,id',
            'cantidad' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Crear el producto en la base de datos
        $producto = InsumoProducto::create([
            'id_producto' => $request->id_producto,
            'id_insumo' => $request->id_insumo,
            'cantidad' => $request->cantidad,
        ]);

        // Responder con el ID del nuevo producto
        return response()->json([
            'success' => true,
        ], 201);
    }
}
