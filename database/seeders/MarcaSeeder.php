<?php

namespace Database\Seeders;

use App\Models\marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        marca::create([
            'nombre' => 'Adata'
        ]);

        marca::create([
            'nombre' => 'AMD'
        ]);

        marca::create([
            'nombre' => 'AOC'
        ]);

        marca::create([
            'nombre' => 'Asrock'
        ]);

        marca::create([
            'nombre' => 'Asus'
        ]);

        marca::create([
            'nombre' => 'Corsair'
        ]);

        marca::create([
            'nombre' => 'Dell'
        ]);

        marca::create([
            'nombre' => 'Encore'
        ]);

        marca::create([
            'nombre' => 'Epson'
        ]);

        marca::create([
            'nombre' => 'Genius'
        ]);

        marca::create([
            'nombre' => 'Gigabyte'
        ]);

        marca::create([
            'nombre' => 'Hp'
        ]);

        marca::create([
            'nombre' => 'Lenovo'
        ]);

        marca::create([
            'nombre' => 'Huawei'
        ]);

        marca::create([
            'nombre' => 'Intel'
        ]);

        marca::create([
            'nombre' => 'Kingston'
        ]);

        marca::create([
            'nombre' => 'Logitech'
        ]);

        marca::create([
            'nombre' => 'Microsoft'
        ]);

        marca::create([
            'nombre' => 'MSI'
        ]);

        marca::create([
            'nombre' => 'Samsung'
        ]);

        marca::create([
            'nombre' => 'Seagate'
        ]);

        marca::create([
            'nombre' => 'Sony'
        ]);

        marca::create([
            'nombre' => 'Toshiba'
        ]);

        marca::create([
            'nombre' => 'Tp-Link'
        ]);

        marca::create([
            'nombre' => 'Crucial'
        ]);
    }
}
