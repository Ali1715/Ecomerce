<?php

namespace App\Http\Controllers;

use App\Mail\SpamMail;
use App\Models\Persona;
use App\Models\Bitacora;
use App\Models\Segmento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

date_default_timezone_set('America/La_Paz');

class SpamController extends Controller
{

    public function index()
    {
        //

        $segmentos =  Segmento::all();
        return (view('administrador.CRM.spam', compact('segmentos')));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->idSegmento == 'todos') {
            $clientes = Persona::where('tipoc', 1)->get();
            foreach ($clientes as $cliente) {
                $request['id'] = $cliente->id;
                Mail::to($cliente->email)->send(new SpamMail($request));
            }
            $action = "Envío un mensaje por correo a todos los clientes";
        } else {
            $segmento = Segmento::find($request->idSegmento);
            $clientes =  $segmento->personas;
            foreach ($clientes as $cliente) {
                $request['id'] = $cliente->id;
                Mail::to($cliente->email)->send(new SpamMail($request));
            }
            $action = "Envío un mensaje por correo a un segmento de clientes";
        }
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
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect('administrador/home')->with('message', 'Enviado exitosamente');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
