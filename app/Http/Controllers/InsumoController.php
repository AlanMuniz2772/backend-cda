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
            'cantidad_captura' => 'nullable|numeric|min:0',
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
            'cantidad_captura' => $request->input('cantidad_captura'),
            'unidad_medida' => $request->input('unidad_medida'),
            'is_available' => $request->input('is_available'),
        ]);

        // Responder con el ID del nuevo producto
        return response()->json([
            'success' => true,
        ], 201);
    }
    public function update(Request $request, $id)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'id_tienda' => 'required|integer|exists:tiendas_master,id', 
            'nombre' => 'required|string|max:255',
            'costo' => 'nullable|numeric|min:0',
            'cantidad_tienda' => 'required|numeric|min:0',
            'cantidad_captura' => 'nullable|numeric|min:0',
            'unidad_medida' => 'required|string|max:10',
            'is_available' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Buscar el producto en la base de datos
        $producto = Insumo::find($id);

        if (!$producto) {
            return response()->json([
                'success' => false,
                'errors' => 'Producto no encontrado',
            ], 404);
        }

        // Actualizar el producto en la base de datos
        $producto->id_tienda = $request->input('id_tienda');
        $producto->nombre = $request->input('nombre');
        $producto->costo = $request->input('costo');
        $producto->cantidad_tienda = $request->input('cantidad_tienda');
        $producto->cantidad_captura = $request->input('cantidad_captura');
        $producto->unidad_medida = $request->input('unidad_medida');
        $producto->is_available = $request->input('is_available');
        $producto->save();

        // Responder con éxito
        return response()->json([
            'success' => true,
        ]);
    }
}
