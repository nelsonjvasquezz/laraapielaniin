<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::all();
        return view('producto.lista', compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return back()->with('message', 'Producto agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::query()->findOrFail($id);
        return  view('producto.mostrar', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::query()->findOrFail($id);
        return view('producto.editar', compact('producto'));
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
        $producto =Producto::query()->find($id);
        $producto->sku = $request->sku;
        $producto->nombre = $request->nombre;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        //return $producto->image_url;
        if ($request->hasFile('imagen')) {

            //Borramos la imagen
            unlink(storage_path('app/public/' . $producto->image_url));

            $producto->image_url = $request->file('imagen')
                ->store('images', 'public');
        }

        $producto->save();

        $producto = Producto::query()->findOrFail($id);
        return view('producto.editar', compact('producto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::query()->findOrFail($id);
        $producto->delete();
        unlink(storage_path('app/public/' . $producto->image_url));
        return back()->with('message', 'Producto eliminado con exito');
    }
}
