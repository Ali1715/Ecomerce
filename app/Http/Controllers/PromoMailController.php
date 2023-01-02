<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromoMailRequest;
use App\Models\Persona;
use App\Models\Promocion;
use Illuminate\Http\Request;
use App\Mail\PromoMail;
use Illuminate\Support\Facades\Mail;

class PromoMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promocion = Promocion::findOrFail($id);
        $clientes = Persona::where('tipoc', 1)->get();
        return view('administrador.gestionar_promociones.msj', compact('promocion', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromoMailRequest $request, $id)
    {
        $request->validated();
        if ($request['idcliente'] == 'todos') {
            $clientes = Persona::where('tipoc', 1)->get();
            foreach ($clientes as $cliente) {
                $request['idcliente'] = $cliente->id;
                Mail::to($cliente->email)->send(new PromoMail($request));
            }
            return redirect('administrador/promociones')->with('message', 'Enviado exitosamente');
        } else {
            $cliente = Persona::findOrFail($request['idcliente']);
            Mail::to($cliente->email)->send(new PromoMail($request));
            return redirect('administrador/promociones')->with('message', 'Enviado exitosamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
