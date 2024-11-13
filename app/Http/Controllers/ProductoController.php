<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function store(Request $request)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'id_tienda' => 'required|integer|exists:tiendas_master,id', 
            'nombre' => 'required|string|max:255',
            'costo' => 'nullable|numeric|min:0',
            'utilidad' => 'nullable|numeric|min:0',
            'precio' => 'required|numeric|min:0',
            'is_available' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Crear el producto en la base de datos
        $producto = Producto::create([
            'id_tienda' => $request->input('id_tienda'),
            'nombre' => $request->input('nombre'),
            'costo' => $request->input('costo'),
            'utilidad' => $request->input('utilidad'),
            'precio' => $request->input('precio'),
            'is_available' => $request->input('is_available'),
        ]);

        // Responder con el ID del nuevo producto
        return response()->json([
            'success' => true,
            'id' => $producto->id,
        ], 201);
    }
}
