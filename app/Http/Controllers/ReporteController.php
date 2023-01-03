<?php

namespace App\Http\Controllers;

use App\Models\marca;
use App\Models\producto;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

use App\Models\categoria;

class ReporteController extends Controller
{
    public function producto()
    {
        $productos = producto::all();
        $marcas = marca::get();
        $categorias = categoria::get();
        $pdf = PDF::loadView('administrador.reportes.producto',compact('productos', 'marcas', 'categorias'));
        return $pdf->stream();
    }
}
