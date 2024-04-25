<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
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
        return view('user.create', compact('user'));
    }

    public function store(UserRequest $request)
    {
        #no se utiliza la funcionalidad incorporada de insercion en la base de datos
        //  para poder hacer un hash de la contraseña antes de guardarla
        $nuevoUser = $request->validated();
        $usuario = new User();
        $usuario->name = $nuevoUser['name'];
        $usuario->email = $nuevoUser['email'];
        $usuario->password = Hash::make($nuevoUser['password']);
        $usuario->save();


        return redirect()->route('users.index')
            ->with('success', 'Usuario creado.');
    }


    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
