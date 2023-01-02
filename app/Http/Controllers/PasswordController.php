<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Bitacora;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use App\Models\Persona;
use App\Models\producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('America/La_Paz');

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()) {
            $user = auth()->user()->id;
            $persona = Persona::where('iduser', $user)->first();
            $TipoC = $persona->tipoc;
            $TipoE = $persona->tipoe;
            if ($TipoC == 1) {
                return redirect('/cliente/home');
            } else {
                if ($TipoE == 1) {
                    return redirect('/administrador/home');
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil = User::find($id);
        $persona = Persona::find($id);
        if ($persona->tipoc == 1) {
            $productos = producto::get();
            $carrito = Carrito::where('idCliente', auth()->user()->id);
            $carrito = $carrito->where('estado', 1)->first();
            $detallesCarrito = DetalleCarrito::get();
            return view('perfilC.editPass', compact('perfil', 'detallesCarrito', 'carrito', 'productos'));
        } else {
            return view('perfil.editPass', compact('perfil'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePasswordRequest $request, $id)
    {
        $perfil = User::find($id);
        $perfil->update($request->validated());
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
        $action = "Cambio de contraseña de la cuenta personal";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        $TipoC = $user->tipoc;
        $TipoE = $user->tipoe;
        if ($TipoC == 1) {
            return redirect('/cliente/home')->with('message', 'Se ha actualizado los datos correctamente.');
        } else {
            if ($TipoE == 1) {
                return redirect('/administrador/home')->with('message', 'Se ha actualizado los datos correctamente.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
