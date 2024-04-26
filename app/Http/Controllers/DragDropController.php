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

    /**
     * Image Upload Code
     *
     * @return void
     */
    public function uploadFiles(Request $request)
    {
        $image = $request->file('file');

        $image = $request->file('file');

        $imageName = time() . '.' . $image->extension();
        $path = $image->store('public/images');
        $temp = explode('/', $path);
        $path = $temp[2];

        Imagenes::create([
            'inmueble' => $request->id,
            'ruta' => $path,
        ]);
        return response()->json(['success' => $request->all()]);
    }
}
