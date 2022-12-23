<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detallenotabaja extends Model
{
    use HasFactory;
    protected $table = 'detallenotabajas';

    protected $fillable = [
        'idnotabaja',
        'idproducto',
        'cantidad',
        'costo',
        'total',
        'observacion',
    ];
}
