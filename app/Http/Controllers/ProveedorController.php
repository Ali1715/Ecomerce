<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterEmpRequest;
use App\Http\Requests\UpdateEmpRequest;
use App\Http\Requests\StoreProveedoreRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Models\User;
use App\Models\Proveedor;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::All();
        return view('administrador.gestionar_proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.gestionar_proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $request->validate([
            'nombre'=>'required',
            'celular'=>'required',
            'direccion'=>'required',
            'correo'=>'required|string|max:255|email',
        ]); 
        $proveedor = Proveedor::where('correo', $request->correo)->get()->first();
        
        if ($proveedor)
        return redirect()->route('gestionar_proveedores.create')->with('message', 'Ya existe ese correo  '.$request->correo);
        

        $proveedor = Proveedor::create([
            'nombre'=>$request->nombre,
            'celular'=>$request->celular,
            'direccion'=>$request->direccion,
            'correo'=>$request->correo,
        ]);

        return redirect()->route('gestionar_proveedores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        //
        return view('administrador.gestionar_proveedor.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProveedorRequest $request, $id)
    {
        //
        $proveedor = Proveedor::find($id);
        $proveedor->update($request->validated());
        $proveedor = proveedor::where('correo', $proveedor->correo)->first();
        $proveedor->update($request->validated());
        $proveedor->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */

    public function destroy( $id )
    {

        $proveedor= Proveedor::find($id);
        $proveedor->delete();
        return redirect()->route('gestionar_proveedores.index');
    }
}
