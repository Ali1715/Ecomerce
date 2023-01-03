<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name',
        'ci',
        'email',
        'sexo',
        'celular',
        'domicilio',
        'salario',
        'estadoemp',
        'estadocli',
        'tipoc',
        'tipoe',
        'iduser',
    ];

    public function segmentos(){
        return $this->belongsToMany('App\Models\Segmento'); 
    }
    
}
