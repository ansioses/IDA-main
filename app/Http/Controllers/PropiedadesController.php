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



class PropiedadesController extends Controller
{
    public $atributo = "none";

    //retornar la vista con el listado de propiedades
    public function index()
    {
        $atributo = "none";
        //llamamos al método por defecto del modelo que nos retorna todos los valores de la tabla propiedades dividos en grupos para paginar
        $propiedades = Propiedades::paginate();
        // $users = DB::table('Propiedades');
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
        // Propiedades::create($request->validated());

        // return redirect()->route('propiedades.index')
        //     ->with('success', 'Inmueble creado.');
        return redirect::route("propiedades.edit", $inmueble->id)->with(['success' => 'Inmueble creado, por favor carga las imágenes en el recuadro más abajo']);

        // return $request->all();
        // Propiedades::create($request->validated());

        // Manejar carga de imágenes
        // if ($request->hasFile('images')) {
        //     foreach ($request->file('images') as $image) {
        //         $path = $image->store('public/images');
        //         // Aquí puedes también guardar la ruta de la imagen en la base de datos o realizar otras acciones
        //     }
        // }

        // // ----------------------------------------------------
        // return redirect()->route('propiedades.index')->with('success', 'Propiedad creada con éxito');

        // return redirect()->route('propiedades.index')
        //     ->with('success', 'Propiedade created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $propiedad = Propiedades::find($id);

        return view('propiedades.show', compact('propiedad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)

    {
        $propiedad = Propiedades::find($id);
        // $imagenes=Imagenes::find($id);
        // $imagenes= DB::table('imagenes')->where('inmueble',$id);
        // $user = Imagenes::with('Profile')->where('status', '1')->get();
        $imagenes = Imagenes::where('inmueble', $id)->get();
        $data = [
            'propiedad' => $propiedad,
            'imagenes' => $imagenes
        ];
        // log::info(print_r($data, true));
        // Storage::put('public/file.txt', json_encode($data));
        return view('propiedades.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(PropiedadesRequest $request, $id, $r)
    // {
    //     log::info(print_r($request, true));
    //     $inmueble = Propiedades::find($id);
    //     $inmueble->titulo = $request->input('titulo');
    //     $inmueble->descripcion = $request->input('descripcion');
    //     $inmueble->precio = $request->input('precio');
    //     $inmueble->direccion = $request->input('direccion');
    //     $inmueble->habitaciones = $request->input('habitaciones');
    //     $inmueble->WC = $request->input('WC');
    //     $inmueble->plantas = $request->input('plantas');

    //     $inmueble->tipo = $request->input('tipo');
    //     $inmueble->size = $request->input('size');
    //     $inmueble->save();
    //     $data = ['msg' => 'guardado'];

    //     return view("propiedades.mensaje", compact('msg'));
    // }
    public function update(PropiedadesRequest $request, Propiedades $propiedade)
    {

        $propiedade->update($request->validated());

        return redirect()->route('propiedades.index')
            ->with('success', 'Propiedade updated successfully');
    }

    public function destroy($id)
    {
        Propiedades::find($id)->delete();

        return redirect()->route('propiedades.index')
            ->with('success', 'Propiedade deleted successfully');
    }
    //En vez de utilizar el método generado por laravel, creo el mío propio para el guardado del inmueble
    //La utilidad es conocer el funcionamiento manual del uso de la base de datos y el trabjo con controladores manuales
    public function updateprop(PropiedadesRequest $request, $id)
    {
        //buscamos uan propiedad por su id
        $inmueble = Propiedades::find($id);
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
        // $data = ['msg' => 'Cambios guardados'];
        $mensaje = 'Cambios guardados';
        // return view("propiedades.mensaje", $data);
        //retornamos la vista con el mensaje deseado
        return redirect::route("propiedades.edit", $id)->with(['msg' => 'mensaje']);
    }
}
