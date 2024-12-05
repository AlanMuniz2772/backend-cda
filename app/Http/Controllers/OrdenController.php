<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;
use Illuminate\Support\Facades\Validator;

class OrdenController extends Controller
{
    
    public function update(Request $request, $id)
{
    // Validación de datos
    $validator = Validator::make($request->all(), [
        'tipo_pago' => 'required|integer|in:1,2', // 1: Efectivo, 2: Tarjeta de Crédito
        'is_registered' => 'required|boolean',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422);
    }

    // Buscar la orden en la base de datos
    $orden = DB::table('orden_venta')->find($id);

    if (!$orden) {
        return response()->json([
            'success' => false,
            'errors' => 'Orden no encontrada',
        ], 404);
    }

    // Eliminar los productos relacionados con la orden en productos_ordenes
    DB::table('productos_ordenes')->where('id_orden', $id)->delete();

    // Actualizar la orden en la base de datos
    $actualizado = DB::table('orden_venta')
        ->where('id', $id)
        ->update([
            'id_tienda' => $request->input('id_tienda'),
            'tipo_pago' => $request->input('tipo_pago'),
            'is_registered' => $request->input('is_registered'),
            'updated_at' => now(), // Registrar el momento de la última actualización
        ]);

    if (!$actualizado) {
        return response()->json([
            'success' => false,
            'message' => 'Error al actualizar la orden',
        ], 500);
    }

    // Responder con éxito
    return response()->json([
        'success' => true,
        'message' => 'Orden actualizada correctamente y productos relacionados eliminados',
    ]);
}

}
