<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segmento extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function personas(){
        return $this->belongsToMany('App\Models\Persona'); 
    }


}
