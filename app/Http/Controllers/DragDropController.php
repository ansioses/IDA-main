<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Imagenes;

use Illuminate\Http\Request;

class DragDropController extends Controller
{

    /**
     * Generate Image upload View
     *
     * @return void
     */
    public function form()
    {
        return view('drag-drop-form');
    }

    //recibimos las imágenes del drag and drop del crud de creación/eliminación de propiedades
    public function uploadFiles(Request $request)
    {
        //recibimos el fichero de images
        $image = $request->file('file');
        //generamos un nombre único para la imagen
        $imageName = time() . '.' . $image->extension();
        //guardamos la imagen en un directorio accesible de forma pñublica
        $path = $image->store('public/images');
        //dividimos la imagen en ruta + nombre
        $temp = explode('/', $path);
        //recogemos únicamente el nombre
        $path = $temp[2];
        //creamos un objeto imagenes del modelo de la tabla,completamos los campos a guardar y creamos la entrada en la tabla
        Imagenes::create([
            'inmueble' => $request->id,
            'ruta' => $path,
        ]);
        return response()->json(['success' => $request->all()]);
    }
}
