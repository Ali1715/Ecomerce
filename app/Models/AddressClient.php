<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_1',
        'address_2',
        'city',
        'department',
        'country',
        'postal_code',
        'id_client',
    ];
}
