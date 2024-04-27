<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfertaRequest;
use Illuminate\Support\Facades\Redirect;

use App\Models\ofertas;
use App\Models\Propiedades;
use Illuminate\Http\Request;

//controla todo lo relacinado con las ofertas realizadas pora la compra de las propiedades
class OfertaController extends Controller
{

    public function index($id)
    {
        //consultamos la propiedad que tenga un determinado id
        $propiedad = Propiedades::find($id);
        //creamos un array y lo completamos con el id para devolverlo a la vista
        $data = [
            'id' => $id
        ];
        return view('login.oferta', compact('data'))->with(compact('propiedad'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    //recibimos tanto los datos del formulario como el id del inmueble
    public function store(OfertaRequest $request, $id)
    {
        //creamos un objeto ofertas correspondiente al modelo de la tabla, completamos los datos y se guarda en la base de datos
        $oferta = new ofertas();
        $oferta->nombre = $request->nombre;
        $oferta->apellidos = $request->apellidos;
        $oferta->oferta = $request->oferta;
        $oferta->direccion = $request->direccion;
        $oferta->telefono = $request->telefono;
        $oferta->propiedad_id = $id;
        $oferta->save();
        return redirect()->route('portal')->with(['msg' => 'Oferta realizada']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    //eliminación de ofertas
    public function destroy(string $id)
    {
        //buscamos la oferta que se corresponda con el id seleccionado y se elimina
        ofertas::find($id)->delete();
        return redirect()->route('dashboard')->with('success', 'Oferta eliminada');;
    }
}
