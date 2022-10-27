<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class producto extends Model
{
    use HasFactory;
    protected $table = 'productos';

    protected $fillable = [
        'name',
        'descripcion',
        'stock',
        'precioUnitario',
        'imagen',
        'idcategoria',
        'idmarca',
    ];
}
