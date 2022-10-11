<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterEmpRequest;
use App\Http\Requests\UpdateEmpRequest;
use App\Models\User;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Persona::where('tipoe', 1)->paginate(10);
        return view('administrador.gestionar_empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.gestionar_empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterEmpRequest $request)
    {
        //dd($request->all());
        $empleado = User::create($request->validated());
        $persona = Persona::create($request->validated());
        $persona->iduser == $empleado->id;
        $persona->save();
        return redirect()->route('empleados.index')->with('mensaje', 'Empleado Agregado Con Éxito');
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
        $empleado = User::findOrFail($id);
        $persona = Persona::where('email', $empleado->email);
        return view('administrador.gestionar_empleados.edit', compact('empleado', 'persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmpRequest $request, $id)
    {
        $empleado = User::find($id);
        $empleado->update($request->validated());
        $persona = Persona::where('email', $empleado->email)->first();
        $persona->update($request->validated());
        $persona->save();
        return redirect('empleado')->with('mensaje', 'Datos Actualizados');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = User::findOrFail($id);
        $persona = Persona::where('email', $empleado->email)->first();
        try {
            $empleado->delete();
            $persona->delete();
            return redirect()->route('administrador.gestionar_empleados.index')->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('administrador.gestionar_empleados.index')->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
