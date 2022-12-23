<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(PersonaSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(PromocionSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(CarritoSeeder::class);
        $this->call(TipoPagoSeeder::class);
        $this->call(AddressClientSeeder::class);
        $this->call(ProveedorSeeder::class);
    }
}
