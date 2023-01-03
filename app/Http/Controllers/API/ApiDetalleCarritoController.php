<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreDetalleCarritoRequest;
use App\Http\Requests\UpdateDetalleCarritoRequest;
use App\Models\DetalleCarrito;

class ApiDetalleCarritoController extends Controller
{
    public function index(Request $request)
    {
       $Carrito= DetalleCarrito::all();

        return response()->json($Carrito);
    }

    public function store(StoreDetalleCarritoRequest $request)
    {
        DetalleCarrito::create($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>' Guardado'
        ],200);
       
    }

    public function show(DetalleCarrito $Carrito)
    {
        
        return response()->json([
            'res'=>true,
            'producto'=>$Carrito
        ],200);
       
    }

    public function update(UpdateDetalleCarritoRequest $request, DetalleCarrito $Carrito)
    {
       $Carrito->update($request->all());
       return response()->json([
        'res'=>true,
            'msg'=>' Actualizado'
       ],200);
    }
    public function destroy(DetalleCarrito $Carrito)
    {
        $Carrito->delete();
        return response()->json([
            'res'=>true,
            'msg'=>' Eliminado'
        ],200);
    }

    
}