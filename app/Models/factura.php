<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    use HasFactory;

    protected $fillable = [
		'NIT',
        'fechaHora',
        'montoTotal',
        'id_cliente',
        'id_pedido',
	];
}
