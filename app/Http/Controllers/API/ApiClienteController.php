<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;


class ApiClienteController extends Controller
{
    public function index(Request $request)
    {
       $cliente= Persona::all();

        return response()->json($cliente);
    }

    public function store(StoreClienteRequest $request)
    {
        Persona::create($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>' Guardado'
        ],200);
       
    }

    public function show($id)
    {
        
        $pesona = Persona::where('persona.id','$id');

       /* $response = [
            'persona' => [
                'id' => $pesona->id,
                'email' => $pesona->email,
                'nombre' => $pesona->name,
                'apellido' => $pesona->ci,
                'telefono' => $pesona->celular,
                'telefono' => $pesona->domicilio,
                //'role' => $pesona->getRoleNames(),
            ],
            //'image' => str_replace('public', 'storage', $pesona->cliente->foto),
        ];
*/
        return response()->json($pesona);
       
    }

    public function update(UpdateClienteRequest $request, persona $cliente)
    {
       $cliente->update($request->all());
       return response()->json([
        'res'=>true,
            'msg'=>' Actualizado'
       ],200);
    }
    public function destroy(persona $cliente)
    {
        $cliente->delete();
        return response()->json([
            'res'=>true,
            'msg'=>'Eliminado'
        ],200);
    }

    
}

