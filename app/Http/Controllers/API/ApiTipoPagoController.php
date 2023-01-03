<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\producto;
use App\Http\Requests\StoreTipoPagoRequest;
use App\Http\Requests\UpdateTipoPagoRequest;
use App\Models\TipoPago;

class ApiTipoPagoController extends Controller
{
    public function index(Request $request)
    {
       $TipoPago= TipoPago::all();

        return response()->json($TipoPago);
    }

    public function store(StoreTipoPagoRequest $request)
    {
        TipoPago::create($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'TipoPago Guardado'
        ],200);
       
    }

    public function show(TipoPago $TipoPago)
    {
        
        return response()->json([
            'res'=>true,
            'producto'=>$TipoPago
        ],200);
       
    }

    public function update(UpdateTipoPagoRequest $request, TipoPago $TipoPago)
    {
       $TipoPago->update($request->all());
       return response()->json([
        'res'=>true,
            'msg'=>'TipoPago Actualizado'
       ],200);
    }
    public function destroy(TipoPago $TipoPago)
    {
        $TipoPago->delete();
        return response()->json([
            'res'=>true,
            'msg'=>'TipoPago Eliminado'
        ],200);
    }

    
}

