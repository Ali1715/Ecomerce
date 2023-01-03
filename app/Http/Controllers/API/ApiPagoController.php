<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\producto;
use App\Http\Requests\StorePagoRequest;
use App\Http\Requests\UpdatePagoRequest;
use App\Models\Pago;
use App\Models\TipoPago;

class ApiPagoController extends Controller
{
    public function index(Request $request)
    {
       $Pago= Pago::all();

        return response()->json($Pago);
    }

    public function store(StorePagoRequest $request)
    {
        Pago::create($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'Pago Guardado'
        ],200);
       
    }

    public function show(Pago $Pago)
    {
        
        return response()->json([
            'res'=>true,
            'producto'=>$Pago
        ],200);
       
    }

    public function update(UpdatePagoRequest $request, Pago $Pago)
    {
       $Pago->update($request->all());
       return response()->json([
        'res'=>true,
            'msg'=>'Pago Actualizado'
       ],200);
    }
    public function destroy(Pago $Pago)
    {
        $Pago->delete();
        return response()->json([
            'res'=>true,
            'msg'=>'Pago Eliminado'
        ],200);
    }

    
}

