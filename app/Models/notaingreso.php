<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class notaingreso extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='notaingreso';

	protected $fillable=[
	
	'FechaHora',
    'idempleado',
    
    
    
	];
}
