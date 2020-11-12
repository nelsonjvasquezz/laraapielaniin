<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Log;

class ProductoAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::all();
        return response()->json(compact('producto'), 200);
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
            $producto = new Producto;
            $producto->sku = $request->sku;
            $producto->nombre = $request->nombre;
            $producto->cantidad = $request->cantidad;
            $producto->precio = $request->precio;
            $producto->descripcion = $request->descripcion;
            if ($request->hasFile('imagen')) {
                $producto->image_url = $request->file('imagen')
                    ->store('images', 'public');
            }

            $producto->save();
        }
        catch (\Exception $exception) {
            $mensaje = 'Error al agregar el producto: ' . $exception;
            return response()->json(compact('mensaje'), 500);
        }

        return response()->json(['mensaje' => 'Producto agregado correctamente'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::query()->find($id);
        if ($producto != null) {
            return response()->json(compact('producto'), 200);
        }

        return response()->json(['mensaje' => 'No se encontró el producto'], 404);
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
        try {
            $producto = Producto::query()->find($id);
            if ($producto != null) {
                $producto->sku = $request->sku;
                $producto->nombre = $request->nombre;
                $producto->cantidad = $request->cantidad;
                $producto->precio = $request->precio;
                $producto->descripcion = $request->descripcion;
                if ($request->hasFile('imagen')) {

                    //Borramos la imagen
                    unlink(storage_path('app/public/' . $producto->image_url));

                    $producto->image_url = $request->file('imagen')
                        ->store('images', 'public');
                }
            }
            else {
                return response()->json(['mensaje' => 'No se encontró el producto'], 404);
            }

            $producto->save();
        }
        catch (\Exception $exception) {
            $mensaje = 'Error al agregar el producto: ' . $exception;
            return response()->json(compact('mensaje'), 500);
        }

        return response()->json(['mensaje' => 'Producto modificado correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::query()->find($id);
        if ($producto == null) {
            return response()->json(['mensaje' => 'No se encontró el producto'], 404);
        }
        $producto->delete();
        unlink(storage_path('app/public/' . $producto->image_url));
        return response()->json(['mensaje' => 'Producto eliminado'], 200);
    }
}
