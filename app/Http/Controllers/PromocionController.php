<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use App\Http\Requests\StorePromocionRequest;
use App\Http\Requests\UpdatePromocionRequest;
use App\Models\Bitacora;
use App\Models\Persona;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promociones = Promocion::paginate(10);
        return view('administrador.gestionar_promociones.index', compact('promociones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.gestionar_promociones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePromocionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromocionRequest $request)
    {
        Promocion::create($request->validated());
        return redirect('administrador/promociones')->with('message', 'Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function show(Promocion $promocion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promocion = Promocion::findOrFail($id);
        return view('administrador.gestionar_promociones.edit', compact('promocion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePromocionRequest  $request
     * @param  \App\Models\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromocionRequest $request, $id)
    {
        $promocion = Promocion::findOrFail($id);
        $promocion->update($request->validated());
        $promocion->save();
        return redirect('administrador/promociones')->with('message', 'Actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promocion = Promocion::findOrFail($id);
        try {
            $promocion->delete();
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
            $action = "Eliminó una promoción";
            $bitacora = Bitacora::create();
            $bitacora->tipou = $tipo;
            $bitacora->name = $user->name;
            $bitacora->actividad = $action;
            $bitacora->fechaHora = date('Y-m-d H:i:s');
            $bitacora->save();
            //---------------
            return redirect('administrador/promociones')->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect('administrador/promociones')->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
