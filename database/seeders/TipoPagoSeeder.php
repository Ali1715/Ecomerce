<?php

namespace Database\Seeders;

use App\Models\TipoPago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPago::create([
            'nombre' => 'Tigo Money',
            'nroCta' => '77561231',
            'qr' => 'qr_example.png',
        ]);
    }
}
