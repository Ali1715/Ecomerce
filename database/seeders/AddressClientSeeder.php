<?php

namespace Database\Seeders;

use App\Models\AddressClient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AddressClient::create([
            'address_1' => 'P.O. Box 735, 8729 Eu Street',
            'address_2' => 'Ap #804-7978 Cras Av.',
            'city' => 'Santa Cruz De La Sierra',
            'department' => 'Santa Cruz',
            'country' => 'Bolivia',
            'postal_code' => '00000',
            'id_client' => '6',
        ]);

        AddressClient::create([
            'address_1' => '628-7459 Aliquam Street',
            'address_2' => '986-9966 A, St.',
            'city' => 'Santa Cruz De La Sierra',
            'department' => 'Santa Cruz',
            'country' => 'Bolivia',
            'postal_code' => '00000',
            'id_client' => '6',
        ]);

        AddressClient::create([
            'address_1' => '4224 Eleifend Ave',
            'address_2' => 'Ap #693-3461 Quis Ave',
            'city' => 'Santa Cruz De La Sierra',
            'department' => 'Santa Cruz',
            'country' => 'Bolivia',
            'postal_code' => '00000',
            'id_client' => '7',
        ]);

        AddressClient::create([
            'address_1' => 'P.O. Box 230, 3839 Class Street',
            'address_2' => '149 Lectus. Road',
            'city' => 'Santa Cruz De La Sierra',
            'department' => 'Santa Cruz',
            'country' => 'Bolivia',
            'postal_code' => '00000',
            'id_client' => '7',
        ]);
    }
}
