<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrdenController extends Controller
{
    public function update(Request $request, $id)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'is_registered' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Buscar la orden en la base de datos
        $orden = Orden::find($id);

        if (!$orden) {
            return response()->json([
                'success' => false,
                'errors' => 'Orden no encontrada',
            ], 404);
        }

        try {
            DB::beginTransaction();

            // Eliminar los productos relacionados con la orden en productos_ordenes
            DB::table('productos_ordenes')->where('id_orden', $id)->delete();

            // Actualizar la orden en la base de datos
            $orden->update([
                'is_registered' => $request->input('is_registered'),
                'updated_at' => now(), // Registrar el momento de la última actualización
            ]);

            DB::commit();

            // Responder con éxito
            return response()->json([
                'success' => true,
                'message' => 'Orden actualizada correctamente y productos relacionados eliminados',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la orden',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
