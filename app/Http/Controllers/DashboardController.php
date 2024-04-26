<?php

namespace App\Http\Controllers;

use App\Models\Propiedades;
use App\Models\ofertas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class DashboardController extends Controller
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";


    public function index()
    {
        //necesitamos devolver la correlación entre ofertas y proopiedades
        $listadoOfertas = DB::table('ofertas')
            ->select('ofertas.created_at', 'ofertas.id', 'ofertas.nombre', 'ofertas.apellidos', 'ofertas.oferta', 'ofertas.direccion', 'ofertas.telefono', 'ofertas.propiedad_id', 'Propiedades.titulo', 'Propiedades.precio', 'Propiedades.tipo')
            ->join('Propiedades', 'Propiedades.id', '=', 'ofertas.id')
            ->orderBy('ofertas.propiedad_id', 'desc')
            ->orderBy('ofertas.oferta', 'desc')
            ->get();

        return view('dashboard', [
            'listado' => $listadoOfertas,
        ]);
    }
}
