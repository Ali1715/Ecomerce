<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => '123456789',
        ])->assignRole('admin');

        Persona::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'ci' => '9866021',
            'sexo' => 'M',
            'celular' => '60522212',
            'domicilio' => 'Santa Cruz',
            'salario' => '3000',
            'estadoemp' => 'Activo',
            'tipoc' => '0',
            'tipoe' => '1',
            'iduser' => '1',
        ]);

        User::create([
            'name' => 'Byron Lewis',
            'email' => 'b@gmail.com',
            'password' => '123456789',
        ])->assignRole('admin');

        Persona::create([
            'name' => 'Byron Lewis',
            'email' => 'b@gmail.com',
            'ci' => '9866022',
            'sexo' => 'M',
            'celular' => '60522211',
            'domicilio' => 'Santa Cruz',
            'salario' => '3000',
            'estadoemp' => 'Activo',
            'tipoc' => '0',
            'tipoe' => '1',
            'iduser' => '2',
        ]);

        User::create([
            'name' => 'Cassady Bridges',
            'email' => 'c@gmail.com',
            'password' => '123456789',
        ])->assignRole('empleado');

        Persona::create([
            'name' => 'Cassady Bridges',
            'email' => 'c@gmail.com',
            'ci' => '9866023',
            'sexo' => 'F',
            'celular' => '60522213',
            'domicilio' => 'Santa Cruz',
            'salario' => '3000',
            'estadoemp' => 'Activo',
            'tipoc' => '0',
            'tipoe' => '1',
            'iduser' => '3',
        ]);

        User::create([
            'name' => 'Dawn Buckley',
            'email' => 'd@gmail.com',
            'password' => '123456789',
        ])->assignRole('empleado');

        Persona::create([
            'name' => 'Dawn Buckley',
            'email' => 'd@gmail.com',
            'ci' => '9866024',
            'sexo' => 'M',
            'celular' => '60522214',
            'domicilio' => 'Santa Cruz',
            'salario' => '3000',
            'estadoemp' => 'Activo',
            'tipoc' => '0',
            'tipoe' => '1',
            'iduser' => '4',
        ]);

        User::create([
            'name' => 'Erica Mosley',
            'email' => 'e@gmail.com',
            'password' => '123456789',
        ]);

        Persona::create([
            'name' => 'Erica Mosley',
            'email' => 'e@gmail.com',
            'ci' => '9866025',
            'sexo' => 'F',
            'celular' => '60522215',
            'domicilio' => 'Santa Cruz',
            'salario' => '3000',
            'estadoemp' => 'Activo',
            'tipoc' => '0',
            'tipoe' => '1',
            'iduser' => '5',
        ]);

        User::create([
            'name' => 'Flavia Kirkland',
            'email' => 'f@gmail.com',
            'password' => '123456789',
        ]);

        Persona::create([
            'name' => 'Flavia Kirkland',
            'email' => 'f@gmail.com',
            'ci' => '9866026',
            'sexo' => 'F',
            'celular' => '60522216',
            'domicilio' => 'Santa Cruz',
            'tipoc' => '1',
            'tipoe' => '0',
            'iduser' => '6',
        ]);

        User::create([
            'name' => 'Galvin Golden',
            'email' => 'g@gmail.com',
            'password' => '123456789',
        ]);

        Persona::create([
            'name' => 'Galvin Golden',
            'email' => 'g@gmail.com',
            'ci' => '9866027',
            'sexo' => 'F',
            'celular' => '60522217',
            'domicilio' => 'Santa Cruz',
            'tipoc' => '1',
            'tipoe' => '0',
            'iduser' => '7',
        ]);
    }
}
