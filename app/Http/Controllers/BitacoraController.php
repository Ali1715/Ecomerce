<?php

namespace App\Http\Controllers;

use App\Exports\LogsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Bitacora;
use App\Http\Requests\StoreBitacoraRequest;
use App\Http\Requests\UpdateBitacoraRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class BitacoraController extends Controller
{
    function __construct()
    {
        $this->middleware('can:bitacora.index', ['only' => 'index']);
        $this->middleware('can:bitacora.export', ['only' => 'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bitacoras = Bitacora::paginate(10);
        return view('administrador.gestionar_bitacoras.index', compact('bitacoras'));
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
     * @param  \App\Http\Requests\StoreBitacoraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBitacoraRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function show(Bitacora $bitacora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function edit($data)
    {
        if ($data == 'csv') {
            return Excel::download(new LogsExport, 'logs.csv');
        } else {
            return Excel::download(new LogsExport, 'logs.xlsx');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBitacoraRequest  $request
     * @param  \App\Models\Bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBitacoraRequest $request, Bitacora $bitacora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bitacora $bitacora)
    {
        //
    }
}
