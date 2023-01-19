<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

date_default_timezone_set('America/La_Paz');

class RoleController extends Controller
{

    public function index()
    {
        //$users = Persona::where('tipoe', 1)->paginate(10);
        $users = User::paginate(10);
        return (view('administrador.roles.index', compact('users')));
    }


    public function create()
    {
        $permisos = Permission::all();
        return (view('administrador.roles.create', compact('permisos')));
    }


    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permisos);
        //Bitacora
        $id2 = Auth::id();
        $user = Persona::where('iduser', $id2)->first();
        $tipo = "default";
        if ($user->tipoe == 1) {
            $tipo = "Empleado";
        }
        if ($user->tipoc == 1) {
            $tipo = "Cliente";
        }
        $action = "Creó un nuevo rol";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('roles.create')->with('info', 'Se registro rol correctamente');
    }


    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return (view('administrador.roles.edit', compact('user', 'roles')));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        //Bitacora
        $id2 = Auth::id();
        $user2 = Persona::where('iduser', $id2)->first();
        $tipo = "default";
        if ($user2->tipoe == 1) {
            $tipo = "Empleado";
        }
        if ($user2->tipoc == 1) {
            $tipo = "Cliente";
        }
        $action = "Asignó un rol a un usuario";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user2->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('roles.edit', $user)->with('info', 'Se asigno los roles correctamente');
    }

    public function destroy($id)
    {
        //
    }
}
