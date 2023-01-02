<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::create([
            'nombre' => 'ALL EXPERIENCE ON COMPUTING SOLUTIONS S.R.L.',
            'correo' => 'ComputingSolution@gmail.com',
            'celular' => '2422898',
            'direccion' => 'Calle Andrés Muñoz N° 2394, Zona Sopocachi',
        ]);

        Proveedor::create([
            'nombre' => 'CREATIVO COMPUTACIÓN Y SISTEMAS',
            'correo' => 'ComputacionSistemas@gmail.com',
            'celular' => '2311277',
            'direccion' => 'Calle Mexico N° 1405, Zona San Pedro',
        ]);

        Proveedor::create([
            'nombre' => 'EXPERT INOVA NETWORKS S.R.L.',
            'correo' => 'ExpertInova@gmail.com',
            'celular' => '2906508',
            'direccion' => 'Calle Mexico casi esquina Colombia N° 1418, Zona San Pedro',
        ]);

        Proveedor::create([
            'nombre' => 'FFIL´S COMPANY S.R.L.',
            'correo' => 'FFILS@gmail.com',
            'celular' => '77710447',
            'direccion' => 'Avenida Busch N° 1196, Zona Miraflores',
        ]);

        Proveedor::create([
            'nombre' => 'INTERFAZ',
            'correo' => 'Interfaz@gmail.com',
            'celular' => '2217098',
            'direccion' => 'Calle México Nº 1487 Zona San Pedro',
        ]);

        Proveedor::create([
            'nombre' => 'SISCOTEC S.R.L.',
            'correo' => 'Siscotec@gmail.com',
            'celular' => '3576565',
            'direccion' => 'Calle Jorge Saenz N° 1005, Zona Miraflores',
        ]);

        Proveedor::create([
            'nombre' => 'SUPER POWER',
            'correo' => 'SPower@gmail.com',
            'celular' => '2311010',
            'direccion' => 'Calle Mexico N° 1457, Zona San Pedro',
        ]);

        Proveedor::create([
            'nombre' => 'WAPLINE',
            'correo' => 'Wapline@gmail.com',
            'celular' => '2810015',
            'direccion' => 'Calle Murillo N° 1379, Zona San Pedro',
        ]);
    }
}
