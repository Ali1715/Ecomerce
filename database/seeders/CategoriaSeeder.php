<?php

namespace Database\Seeders;

use App\Models\categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        categoria::create([
            'nombre' => 'Almacenamiento',
        ]);

        categoria::create([
            'nombre' => 'Tarjeta Madre',
        ]);

        categoria::create([
            'nombre' => 'Memoria Ram',
        ]);

        categoria::create([
            'nombre' => 'Procesador',
        ]);

        categoria::create([
            'nombre' => 'Laptop',
        ]);

        categoria::create([
            'nombre' => 'Case',
        ]);

        categoria::create([
            'nombre' => 'Monitor',
        ]);

        categoria::create([
            'nombre' => 'Mouse',
        ]);

        categoria::create([
            'nombre' => 'Teclado',
        ]);
    }
}
