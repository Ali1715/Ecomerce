<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterEmpRequest;
use App\Http\Requests\UpdateEmpRequest;
use App\Http\Requests\StoreProveedoreRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Models\Bitacora;
use App\Models\User;
use App\Models\Proveedor;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('America/La_Paz');

class ProveedorController extends Controller
{
    function __construct()
    {
        $this->middleware('can:proveedor.index', ['only' => 'index']);
        $this->middleware('can:proveedor.create', ['only' => ['create', 'store']]);
        $this->middleware('can:proveedor.update', ['only' => ['edit', 'update']]);
        $this->middleware('can:proveedor.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::paginate(10);
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
            'nombre' => 'required',
            'celular' => 'required',
            'direccion' => 'required',
            'correo' => 'required|string|max:255|email',
        ]);
        $proveedor = Proveedor::where('correo', $request->correo)->get()->first();

        if ($proveedor)
            return redirect()->route('gestionar_proveedores.create')->with('message', 'Ya existe ese correo  ' . $request->correo);

        $proveedor = Proveedor::create([
            'nombre' => $request->nombre,
            'celular' => $request->celular,
            'direccion' => $request->direccion,
            'correo' => $request->correo,
        ]);

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
        $action = "Creó un registro de un proveedor";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //---------------
        return redirect()->route('proveedor.index');
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
    public function edit($id)
    {
        //
        $gestionar_proveedore = Proveedor::find($id);
        return view('administrador.gestionar_proveedores.edit', compact('gestionar_proveedore'));
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
        $request->validate([
            'nombre' => 'required',
            'celular' => 'required',
            'direccion' => 'required',
            'correo' => 'required|string|max:255|email',
        ]);
        $proveedor = Proveedor::find($id);

        $proveedor->update([
            'nombre' => $request->nombre,
            'celular' => $request->celular,
            'direccion' => $request->direccion,
            'correo' => $request->correo,
        ]);

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
        $action = "Editó un registro de un proveedor";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //---------------
        return redirect()->route('proveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $request = Request::capture();
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
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
        $action = "Eliminó un registro de un proveedor";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //---------------
        return redirect()->route('proveedor.index');
    }
}
