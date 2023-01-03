<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Models\Bitacora;
use App\Models\Carrito;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('America/La_Paz');

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show()
    {
        if(Auth::check()){
            return redirect('/home');
        }
        return view('auth.register');
    }

    public function register(StoreClienteRequest $request)
    {
        $user = User::create($request->validated());
        $persona = Persona::create($request->validated());
        $persona->iduser = $user->id;
        $persona->save();
        //Bitacora
        $tipo = 'default';
        if ($persona->tipoe == 1) {
            $tipo = "Empleado";
        }
        if ($persona->tipoc == 1) {
            $tipo = "Cliente";
        }
        $action = "Se registró un nuevo cliente";
        $Bitacora = Bitacora::create();
        $Bitacora->tipou = $tipo;
        $Bitacora->name = $user->name;
        $Bitacora->actividad = $action;
        $Bitacora->fechaHora = date('Y-m-d H:i:s');
        $Bitacora->ip = $request->ip();
        $Bitacora->save();
        //-------------------------------
        //Carrito
        Carrito::create([
            'fechaHora' => date('Y-m-d H:i:s'),
            'estado' => '1',
            'total' => '0',
            'idCliente' => $user->id
        ]);
        //------------------------------
        return redirect('/login')->with('success', 'Account created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
