<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = User::all();
        return response()->json(compact('usuario'), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = $request->all();
            $user['password'] = Hash::make($user['password']);
            User::query()->create($user);
        }
        catch (\Exception $exception) {
            $mensaje = 'Error al agregar el usuario: ' . $exception;
            return response()->json(compact('mensaje'), 500);
        }
        return response()->json(['mensaje' => 'usuario agregado correctamente'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::query()->find($id);
        if ($usuario != null) {
            return response()->json(compact('usuario'), 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::query()->find($id);
        if ($user == null) {
            return response()->json(['mensaje' =>'No se encontró el usuario'], 404);
        }

        try {
            $user = $request->all();
            if ($user['password'] != Hash::make($request['password'])) {
                $user['password'] = Hash::make($request['password']);
            }

            User::query()->where('id', '=', $id)->update($user);
            return response()->json(['mensaje' => 'usuario modificado correctamente'], 200);
        }
        catch (\Exception $exception) {
            $mensaje = 'Error al actualizar el usuario: ' . $exception;
            return response()->json(compact('mensaje'), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::query()->find($id);
        if ($user == null) {
            return response()->json(['mensaje' => 'No se encontró el producto'], 404);
        }

        $user->delete();
        
        return response()->json(['mensaje' => 'Usuario eliminado'], 200);
    }
}
