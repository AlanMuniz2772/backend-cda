<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'rol_operacion' => 'nullable|string|max:100',
            'sueldo_semanal' => 'nullable|numeric|min:0|max:999999.99',
            'bono_semanal' => 'nullable|numeric|min:0|max:999999.99',
            'horas_trabajadas' => 'nullable|numeric|min:0|max:999.99',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));
        $user->rol_operacion = $request->input('rol_operacion');
        $user->sueldo_semanal = $request->input('sueldo_semanal');
        $user->bono_semanal = $request->input('bono_semanal');
        $user->horas_trabajadas = $request->input('horas_trabajadas');
        $user->save();

        return response()->json(['message' => 'User updated successfully'], 200);
    }

    //funcion elimina usuario
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
