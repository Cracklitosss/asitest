<?php

namespace App\Http\Controllers;

use App\Models\ImagenProducto;
use Illuminate\Http\Request;

class ImagenProductoController extends Controller
{
    public function index()
    {
        $imagenesProducto = ImagenProducto::all();
        return response()->json($imagenesProducto);
    }

    public function store(Request $request)
    {
        $imagenProducto = ImagenProducto::create($request->all());
        return response()->json($imagenProducto, 201);
    }

    public function show($id)
    {
        $imagenProducto = ImagenProducto::findOrFail($id);
        return response()->json($imagenProducto);
    }

    public function update(Request $request, $id)
    {
        $imagenProducto = ImagenProducto::findOrFail($id);
        $imagenProducto->update($request->all());
        return response()->json($imagenProducto, 200);
    }

    public function destroy($id)
    {
        ImagenProducto::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
