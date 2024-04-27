<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use App\Http\Requests\UserRequest;
use Hamcrest\Arrays\IsArray;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    use Notifiable, HasRoles;

    public function index()
    {
        //hacemos una paginación para dividir los resultados en varias páginas
        $users = User::paginate();

        //retornamos la vista con los datos del usuario
        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }


    public function create()
    {
        #no genera el usuario, devuelve la vista donde se generará pasándole un objeto user
        $user = new User();
        //recogemos todos los roles de la tabla
        $roles = Role::get();
        //creamos una variable vacía ya que la vista hace uso de ella en otro controlador, si no existe genera un error
        $rol = '';
        //retornamos la vista del formulario de creación de usuarios con roles recogidos para rellenar el select
        return view('user.create', compact('user'))->with('roles', $roles)->with('rol', $rol);
    }

    public function store(UserRequest $request)
    {
        #no se utiliza la funcionalidad estándard de insercion en la base de datos
        //  para poder hacer un hash de la contraseña antes de guardarla y crear el usuario con el rol seleccionado
        $nuevoUser = $request->validated();
        User::create([
            'name' => $nuevoUser['name'],
            'email' => $nuevoUser['email'],
            'password' => Hash::make($nuevoUser['password']), // Usa un hash para la contraseña
        ])->assignRole($request->rol);

        //retornamos la vista del listado de usuarios con un mensaje
        return redirect()->route('users.index')
            ->with('success', 'Usuario creado.');
    }


    public function show($id)
    {
        //buscamos al usuario por su id
        $user = User::find($id);
        //retornamos la vista que muestra los datos del perfil de usuario, es únicamente de visualización, no tiene funciones
        //asignadas
        return view('user.show', compact('user'));
    }

    //retornar la vista del formulario para el cambio de datos de un usuario
    public function edit($id)
    {
        //traemos los datos del usuario
        $user = User::find($id);
        //traemos los roles definidos
        $roles = Role::get();
        //consultamos el rol del usuario
        $rol = DB::table('users')->leftJoin('model_has_roles', 'users.id', '=', 'model_id')
            ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('users.id', $id)
            ->get()->toArray();
        //retornamos la vista para la edición de datos del usuario
        return view('user.edit', compact('user'))->with('roles', $roles)->with('rol', $rol);
    }

    //guardado de los datos desde el formulario de edición de usuarios
    public function update(UserRequest $request, $id)
    {
        //validamos los datos del formulario
        $nuevoUser = $request->validated();
        //actualizamos los datos del usuario asinándole la contraseña y el rol escogido
        User::updateOrCreate(['id' => $id], [
            'name' => $nuevoUser['name'],
            'email' => $nuevoUser['email'],
            'password' => Hash::make($nuevoUser['password']), // Usa un hash para la contraseña
        ])->assignRole($request->rol)->with;
        //retornamos la vista del listado de usuarios con un mensaje
        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado correctamente');
    }
    //eliminación de usuarios
    public function destroy($id)
    {
        //eliminamos el usuarios filtrado por la id
        User::find($id)->delete();
        //retornamos la vista del listado de usuarios con un mensaje a mostrar
        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado correctamente');
    }
}
