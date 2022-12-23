<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detallenotaingreso extends Model
{
    use HasFactory;
    protected $table = 'detallenotaingresos';

    protected $fillable = [
        'idnotaing',
        'idproducto',
        'cantidad',
        'costo',
        'total',
    ];
}
