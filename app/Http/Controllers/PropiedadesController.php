<?php

namespace App\Http\Controllers;

use App\Models\Propiedades;
use App\Models\Imagenes;
use App\Http\Requests\PropiedadesRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;


//controla todo lo relacionado con los inmuebles
class PropiedadesController extends Controller
{
    public $atributo = "none";

    //retornar la vista con el listado de propiedades
    public function index()
    {
        $atributo = "none";
        //llamamos al método por defecto del modelo que nos retorna todos los valores de la tabla propiedades dividos en grupos para paginar
        $propiedades = Propiedades::paginate();
        //retornamos la vista con los datos dividios en grupos para paginar
        return view('propiedades.index', compact('propiedades'))
            ->with('i', (request()->input('page', 1) - 1) * $propiedades->perPage());
    }

    //redireccionaremos a la vista de creacion de propiedades
    public function create()
    {
        $atributo = "none";
        $propiedad = new Propiedades();
        return view('propiedades.create')->with(compact('propiedad'), $atributo);
    }

    //recibimos los datos del formulario en objeto de tipo PropiedadesRequest que realizará la validación
    public function store(PropiedadesRequest $request)
    {
        //validacion de los datos recibidos
        $prop = $request->validated();
        //creamos el objeto con los tipos definidos en el modelo de la tabla
        $inmueble = new Propiedades();
        $inmueble->titulo = $prop['titulo'];
        $inmueble->descripcion = $prop['descripcion'];
        $inmueble->precio = $prop['precio'];
        $inmueble->direccion = $prop['direccion'];
        $inmueble->habitaciones = $prop['habitaciones'];
        $inmueble->WC = $prop['WC'];
        $inmueble->plantas = $prop['plantas'];
        $inmueble->size = $prop['size'];
        $inmueble->tipo = $prop['tipo'];
        //guardamos los datos utilizando los métodos del objeto
        $inmueble->save();
        //obtenemos los datos recien creados
        $inmueble->refresh();
        Storage::put('public/store.txt', json_encode($inmueble->all()));
        return redirect::route("propiedades.edit", $inmueble->id)->with(['success' => 'Inmueble creado, por favor carga las imágenes en el recuadro más abajo']);
    }


    //retornar una vista con los datos de una propiedad mediante su id
    public function show($id)
    {
        //recoger los datos de la propiedad en concreto mediante su id
        $propiedad = Propiedades::find($id);
        //retornamos la vista pasándole los datos de la propiedad
        return view('propiedades.show', compact('propiedad'));
    }

    //mostrar el formulario de la edición de propiedadades para uno en concreto
    public function edit($id)

    {
        //recogemos los datos almacenados en la tabla para un determinado id
        $propiedad = Propiedades::find($id);
        //recogemos las inmágenes almacenadas en la tabla para un determinado id de propiedad
        $imagenes = Imagenes::where('inmueble', $id)->get();
        //cargamos ambos datos en un array
        $data = [
            'propiedad' => $propiedad,
            'imagenes' => $imagenes
        ];
        //retornamos el formulario de edición con los datos cargados
        return view('propiedades.edit', compact('data'));
    }

    //actualizar datos de las propiedades, recogemos los datos en un objeto de tipo PropiedadesRequest para que realice la
    //validación de los datos introducidos, la validación (app->http->requests->PropiedadesRequest) retornará los errores
    // que se generen mediante las reglas propuestas en la clase
    public function update(PropiedadesRequest $request, Propiedades $propiedade)
    {
        //recogemos los datos proporcionados por el formulario de edición de propiedades y los actualizamos en la tabla
        $propiedade->update($request->validated());
        //retornamos la vista del listado de propiedades con un mensaje a mostar
        return redirect()->route('propiedades.index')
            ->with('success', 'Propiedad actualizada correctamente');
    }
    //realiza el borrado de propiedades
    public function destroy($id)
    {
        //buscamos la propiedad a borrar mediante su id y se elimina
        Propiedades::find($id)->delete();
        //redireccionamos al listado de propiedades con un mensaje a mostrar
        return redirect()->route('propiedades.index')
            ->with('success', 'Propiedad eliminada');
    }
    //En vez de utilizar el método generado por laravel, creo el mío propio para el guardado del inmueble
    //La utilidad es conocer el funcionamiento manual del uso de la base de datos y el trabjo con controladores propios
    public function updateprop(PropiedadesRequest $request, $id)
    {
        //buscamos uan propiedad por su id
        $inmueble = Propiedades::find($id);
        //actualizamos los campos pertienentes con los valores recibidos
        $inmueble->titulo = $request->input('titulo');
        $inmueble->descripcion = $request->input('descripcion');
        $inmueble->precio = $request->input('precio');
        $inmueble->direccion = $request->input('direccion');
        $inmueble->habitaciones = $request->input('habitaciones');
        $inmueble->WC = $request->input('WC');
        $inmueble->plantas = $request->input('plantas');
        $inmueble->tipo = $request->input('tipo');
        $inmueble->size = $request->input('size');
        //guardamos los datos recibidos, estos ya fueron validados como correctos al recibirlos en un objeto de tipo PropiedadesRequest
        $inmueble->save();
        //retornamos la vista con el mensaje deseado
        return redirect::route("propiedades.edit", $id)->with(['msg' => 'mensaje']);
    }
}
