<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedors';

    protected $fillable = [
        'nombre',
        'correo',
        'celular',
        'direccion',
    ];
}
