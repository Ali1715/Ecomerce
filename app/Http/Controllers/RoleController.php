<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
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
        return redirect()->route('roles.edit', $user)->with('info', 'Se asigno los roles correctamente');
    }

    public function destroy($id)
    {
        //
    }
}
