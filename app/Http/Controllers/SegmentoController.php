<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Bitacora;
use App\Models\Segmento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('America/La_Paz');

class SegmentoController extends Controller
{
    public function index()
    {
        $segmentos = Segmento::paginate(10);
        return (view('administrador.gestionar_segmentos.index', compact('segmentos')));
    }

    public function create()
    {
        $personas = Persona::all();
        return (view('administrador.gestionar_segmentos.create', compact('personas')));
    }

    public function store(Request $request)
    {
        $segmento = Segmento::create(['name' => $request->name]);
        $segmento->personas()->attach($request->personas);
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
        $action = "Creó un nuevo segmento";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('segmentos.create')->with('info', 'Se creo segmento correctamente');
    }


    public function show($id)
    {
        //
    }

    public function edit(Segmento $segmento)
    {
        $personas = Persona::all();
        return (view('administrador.gestionar_segmentos.edit', compact('segmento', 'personas')));
    }

 
    public function update(Request $request)
    {
        $segmento = Segmento::find($request->segmento);
        $segmento->personas()->sync($request->personas);
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
        $action = "Modifico un segmento";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('segmentos.edit',$segmento)->with('info', 'Se modifico segmento correctamente');
    }


    public function destroy($id)
    {
        //
    }
}
