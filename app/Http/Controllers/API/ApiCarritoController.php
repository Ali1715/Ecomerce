<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreCarritoRequest;
use App\Http\Requests\UpdateCarritoRequest;
use App\Models\Carrito;

class ApiCarritoController extends Controller
{
    public function index(Request $request)
    {
       $Carrito= Carrito::all();

        return response()->json($Carrito);
    }

    public function store(StoreCarritoRequest $request)
    {
        Carrito::create($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>' Guardado'
        ],200);
       
    }

    public function show(Carrito $Carrito)
    {
        
        return response()->json([
            'res'=>true,
            'producto'=>$Carrito
        ],200);
       
    }

    public function update(UpdateCarritoRequest $request, Carrito $Carrito)
    {
       $Carrito->update($request->all());
       return response()->json([
        'res'=>true,
            'msg'=>' Actualizado'
       ],200);
    }
    public function destroy(Carrito $Carrito)
    {
        $Carrito->delete();
        return response()->json([
            'res'=>true,
            'msg'=>' Eliminado'
        ],200);
    }

    
}

