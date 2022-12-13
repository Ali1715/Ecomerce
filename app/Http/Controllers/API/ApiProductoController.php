<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;


class ApiProductoController extends Controller
{
    public function index(Request $request)
    {
       $productos= producto::all();

        return response()->json($productos);
    }

    public function store(StoreProductoRequest $request)
    {
        producto::create($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'Producto Guardado'
        ],200);
       
    }

    public function show(producto $producto)
    {
        
        return response()->json([
            'res'=>true,
            'producto'=>$producto
        ],200);
       
    }

    public function update(UpdateProductoRequest $request, producto $producto)
    {
       $producto->update($request->all());
       return response()->json([
        'res'=>true,
            'msg'=>'Producto Actualizado'
       ],200);
    }
    public function destroy(producto $producto)
    {
        $producto->delete();
        return response()->json([
            'res'=>true,
            'msg'=>'Producto Eliminado'
        ],200);
    }

    
}

