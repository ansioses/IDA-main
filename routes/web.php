<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BidController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\DragDropController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\PropiedadesController;

// Route::get('/', function () {
//     return redirect('/login');
// });
Route::get('/', function () {
    return view('login.main');
});


// Ruta para mostrar la vista de login y la página principal

Route::get('main', [LoginController::class, 'main'])->name('main');
Route::get('portal', [LoginController::class, 'index'])->name('portal');
// ruta para el control de usuarios administradores
Route::resource('users', UserController::class)->names('admin.user');

//ruta para gestionar las ofertas
Route::put('oferta/{id}', [OfertaController::class, 'store'])->name('guardaoferta');
Route::get('oferta/{id}', [OfertaController::class, 'index'])->name('oferta');
Route::delete('oferta/{id}', [OfertaController::class, 'destroy'])->name('oferta');
Route::get('show', [OfertaController::class, 'index'])->name('index');


//para la actualizacion de inmuebles creo una ruta propia en vez de utilizar la generada por resource con un fin educativo
Route::PUT('updateprop/{id}', [PropiedadesController::class, 'updateprop'])->name('updateprop');
//ruta para mostrar las imagenes asociadas a los inmuebles
Route::resource('imagenes', ImagenesController::class);
//ruta asociada al crud de ofertas
Route::resource('bids', BidController::class);
// ruta asociada a la generación de mensajes
Route::resource('mensajes', MensajeController::class);




//gurpo de rutas protegido por la autenticación, redireccionarán al login
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //rutas para la generación del panel, está en estado de testing
    Route::resource('dashboard', DashboardController::class)->names([
        'index'   => 'dashboard',
        'create'  => 'dashboard.create',
        'store'   => 'dashboard.store',
        'show'    => 'dashboard.show',
        'edit'    => 'dashboard.edit',
        'update'  => 'dashboard.update',
        'destroy' => 'dashboard.destroy',
    ]);;
    //para la gestión de inmuebles
    Route::resource('propiedades', PropiedadesController::class);
    //ruta para el crud de usuarios
    Route::resource('users', UserController::class);
    //ruta para la carga de  las imagenes asociadas a los inmuebles mediante la parte de formulario con un drag-and-drop utilizando AJAX
    Route::get('drag-drop-form', [DragDropController::class, 'form']);
    //ruta para ell guardado de imágenes
    Route::post('uploadFiles', [DragDropController::class, 'uploadFiles']);
    //para la actualizacion de inmuebles creo una ruta propia en vez de utilizar la generada por resource con un fin educativo
    Route::PUT('updateprop/{id}', [PropiedadesController::class, 'updateprop'])->name('updateprop');
    //ruta para mostrar las imagenes asociadas a los inmuebles
    Route::resource('imagenes', ImagenesController::class);
    //ruta asociada al crud de ofertas
    Route::resource('bids', BidController::class);
    // ruta asociada a la generación de mensajes
    Route::resource('mensajes', MensajeController::class);
});
