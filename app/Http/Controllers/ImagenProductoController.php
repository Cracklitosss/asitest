<?php

namespace App\Http\Controllers;

use App\Models\ImagenProducto;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ImagenProductoController extends Controller
{
    public function index()
    {
        $imagenesProducto = ImagenProducto::all();
        return response()->json($imagenesProducto);
    }

    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image|max:2048', // Validación del archivo de imagen
        ]);

        // Cargar la imagen en Cloudinary
        $uploadedFileUrl = Cloudinary::upload($request->file('imagen'))->getSecurePath();
        
        // Crear un nuevo registro de imagen con la URL de la imagen cargada
        $imagenProducto = ImagenProducto::create([
            'url_imagen' => $uploadedFileUrl
        ]);

        // Devolver el registro de imagen creado en formato JSON
        return response()->json($imagenProducto, 201);
    }

    public function show($id)
    {
        $imagenProducto = ImagenProducto::findOrFail($id);
        return response()->json($imagenProducto);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'imagen' => 'nullable|image|max:2048', // Validación opcional del archivo de imagen
        ]);

        $imagenProducto = ImagenProducto::findOrFail($id);

        if ($request->hasFile('imagen')) {
            // Si se proporciona una nueva imagen, cargarla en Cloudinary
            $uploadedFileUrl = Cloudinary::upload($request->file('imagen'))->getSecurePath();
            // Actualizar la URL de la imagen
            $imagenProducto->url_imagen = $uploadedFileUrl;
        }

        // Guardar los cambios en el registro de imagen
        $imagenProducto->save();

        // Devolver el registro de imagen actualizado en formato JSON
        return response()->json($imagenProducto, 200);
    }

    public function destroy($id)
    {
        $imagenProducto = ImagenProducto::findOrFail($id);
        // Eliminar la imagen de Cloudinary
        Cloudinary::destroy($imagenProducto->url_imagen);
        // Eliminar el registro de imagen de la base de datos
        $imagenProducto->delete();
        return response()->json(null, 204);
    }
}
