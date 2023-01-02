<?php

namespace Database\Seeders;

use App\Models\Carrito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        Carrito::create([
            'fechaHora' => date('Y-m-d H:i:s'),
            'estado' => '1',
            'total' => '0',
            'idCliente' => '6'
        ]);

        Carrito::create([
            'fechaHora' => date('Y-m-d H:i:s'),
            'estado' => '1',
            'total' => '0',
            'idCliente' => '7'
        ]);

        Carrito::create([
            'fechaHora' => date('Y-m-d H:i:s'),
            'estado' => '1',
            'total' => '0',
            'idCliente' => '8'
        ]);
    }
}
