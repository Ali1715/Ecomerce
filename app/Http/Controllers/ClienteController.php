<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Persona::where('tipoc', 1)->paginate(10);
        return view('administrador.gestionar_clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.gestionar_clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClienteRequest $request)
    {
        $cliente = User::create($request->validated());
        $persona = Persona::create($request->validated());
        $persona->iduser == $cliente->id;
        $persona->save();
        return redirect()->route('clientes.index')->with('mensaje', 'cliente Agregado Con Éxito');
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
        $cliente = Persona::findOrFail($id);
        return view('administrador.gestionar_clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClienteRequest $request, $id)
    {
        $persona = Persona::find($id);
        $persona->update($request->validated());
        $cliente = User::where('email', $persona->email)->first();
        $cliente->update($request->validated());
        $cliente->save();
        return redirect()->route('clientes.index')->with('mensaje', 'Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $cliente = User::where('email', $persona->email)->first();
        try {
            $cliente->delete();
            $persona->delete();
            return redirect()->route('clientes.index')->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('clientes.index')->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
