<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

date_default_timezone_set('America/La_Paz');

class CierreSesionController extends Controller
{
    public function logout()
    {
        $request = Request::capture();
        //Bitacora
        $id = Auth::id();
        $user = User::find($id);
        $persona = Persona::where('email', $user->email)->first();
        $tipo = "default";
        if ($persona->tipoe == 1) {
            $tipo = "Empleado";
        }
        if ($persona->tipoc == 1) {
            $tipo = "Cliente";
        }
        $action = "Cerró sesion";
        $Bitacora = Bitacora::create();
        $Bitacora->tipou = $tipo;
        $Bitacora->name = $persona->name;
        $Bitacora->actividad = $action;
        $Bitacora->fechaHora = date('Y-m-d H:i:s');
        $Bitacora->ip = $request->ip();
        $Bitacora->save();
        //----------
        Session::flush();
        Auth::logout();
        return redirect()->to('/login');
    }
}
