<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categoria extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='categorias';

	protected $fillable=[
	
	'nombre',
    
	];
}
