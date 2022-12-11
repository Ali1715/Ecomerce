<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'fechaHora',
        'total',
        'estado',
        'fechaEnvio',
        'fechaEntrega',
        'id_carrito',
        'id_direccion',
        'id_pago',
    ];
}
