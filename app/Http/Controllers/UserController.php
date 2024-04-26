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
        $users = User::paginate();


        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }


    public function create()
    {
        #no genera el usuario, devuelve la vista donde se generará pasándole un objeto user
        $user = new User();
        $roles = Role::get();
        $rol = '';
        return view('user.create', compact('user'))->with('roles', $roles)->with('rol', $rol);
    }

    public function store(UserRequest $request)
    {
        #no se utiliza la funcionalidad estándard de insercion en la base de datos
        //  para poder hacer un hash de la contraseña antes de guardarla
        $nuevoUser = $request->validated();
        User::create([
            'name' => $nuevoUser['name'],
            'email' => $nuevoUser['email'],
            'password' => Hash::make($nuevoUser['password']), // Usa un hash para la contraseña
        ])->assignRole($request->rol);


        return redirect()->route('users.index')
            ->with('success', 'Usuario creado.');
    }


    public function show($id)
    {
        //buscamos al usuario por su id
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

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

        return view('user.edit', compact('user'))->with('roles', $roles)->with('rol', $rol);
    }

    public function update(UserRequest $request, $id)
    {

        //validamos los datos del formulario
        $nuevoUser = $request->validated();
        //actualizamos los datos del usuario
        User::updateOrCreate(['id' => $id], [
            'name' => $nuevoUser['name'],
            'email' => $nuevoUser['email'],
            'password' => Hash::make($nuevoUser['password']), // Usa un hash para la contraseña
        ])->assignRole($request->rol)->with;

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
