<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class producto extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='productos';

	protected $fillable=[
	
	'name',
    'descripcion',
    'precioStock',
    'precioUnitario',
    'imagen',
    'idcategoria',
    'idmarca',
    
    
    
	];
}
