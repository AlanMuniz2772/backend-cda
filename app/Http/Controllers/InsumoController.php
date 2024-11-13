<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumo;
use Illuminate\Support\Facades\Validator;

class InsumoController extends Controller
{
    public function store(Request $request)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'id_tienda' => 'required|integer|exists:tiendas_master,id', 
            'nombre' => 'required|string|max:255',
            'costo' => 'nullable|numeric|min:0',
            'cantidad_tienda' => 'required|numeric|min:0',
            'unidad_medida' => 'required|string|max:10',
            'is_available' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Crear el producto en la base de datos
        $producto = Insumo::create([
            'id_tienda' => $request->input('id_tienda'),
            'nombre' => $request->input('nombre'),
            'costo' => $request->input('costo'),
            'cantidad_tienda' => $request->input('cantidad_tienda'),
            'unidad_medida' => $request->input('unidad_medida'),
            'is_available' => $request->input('is_available'),
        ]);

        // Responder con el ID del nuevo producto
        return response()->json([
            'success' => true,
        ], 201);
    }
}
