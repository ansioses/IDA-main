<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedades;
use App\Models\Imagenes;
use Illuminate\Support\Facades\DB;

//esta clase controla tanto la autenticación como el acceso a la página pública
class LoginController extends Controller
{
    //acceso a la página pública del portal de inmuebles
    public function index()
    {
        //consultamos todas las propiedades la tabla y la paginamos para mostrar varias paginas si existiesen muchas entradas
        $propiedades = Propiedades::paginate();
        //consultamos todas las imagenes
        $imagenes = Imagenes::get();
        return view('login.portal', compact('propiedades', 'imagenes'))
            ->with('i', (request()->input('page', 1) - 1) * $propiedades->perPage());
    }
    //retorna el formulario para el login
    public function login()
    {
        return view('auth.login');
    }
    //retorna la página pública principal
    public function main()
    {
        return view('login.main');
    }
}
