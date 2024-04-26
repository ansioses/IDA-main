<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfertaRequest;
use Illuminate\Support\Facades\Redirect;

use App\Models\ofertas;
use App\Models\Propiedades;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // $atributo = $request;
        $propiedad = Propiedades::find($id);
        $data = [
            'id' => $id
        ];
        // dd($id);
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
        $oferta = new ofertas();
        $oferta->nombre = $request->nombre;
        $oferta->apellidos = $request->apellidos;
        $oferta->oferta = $request->oferta;
        $oferta->direccion = $request->direccion;
        $oferta->telefono = $request->telefono;
        $oferta->propiedad_id = $id;
        // $oferta->validated();
        $oferta->save();
        $mensaje = 'Oferta realizada';
        $data = [
            'id' => $id
        ];
        // dd($id);
        return view('login.oferta', compact('data'))->with(['msg' => 'Oferta realizada']);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
