<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\producto;


class ApiProductoController extends Controller
{
    public function index(Request $request)
    {
       $productos= producto::all();

        return response()->json($productos);
    }

    public function store(Request $request)
    {

    }

    public function update()
    {
       
    }
    public function destroy()
    {
        
    }

    
}

