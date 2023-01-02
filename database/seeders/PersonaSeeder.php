<?php

namespace Database\Seeders;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Seeder;
use Laravel\Sanctum\PersonalAccessToken;
use PhpParser\Parser\Tokens;

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
        ])->assignRole('Administrador');

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
        ])->assignRole('Supervisor');

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
        ])->assignRole('RRHH');

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
        ])->assignRole('Marketing');

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
        ])->assignRole('Almacenador');

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

        PersonalAccessToken::create([
            'tokenable_type' => 'App\Models\User',
            'tokenable_id' => '7',
            'name' => 'auth_token',
            'token' => 'b1245a0ae33cd3b901b1db004cc12371ed800c078670d430b5b9141309890963',
            'abilities' => '["*"]',
            //'last_used_at' => ,
            //'created_at' => ,
           // 'updated_at' => ,
           // 'expires_at' => '7',
        ]);

        User::create([
            'name' => 'Michael',
            'email' => 'm79832142l@gmail.com',
            'password' => '123456789',
        ]);

        Persona::create([
            'name' => 'Michael',
            'email' => 'm79832142l@gmail.com',
            'ci' => '9866054',
            'sexo' => 'M',
            'celular' => '60933325',
            'domicilio' => 'Santa Cruz',
            'tipoc' => '1',
            'tipoe' => '0',
            'iduser' => '8',
        ]);
    }
}
