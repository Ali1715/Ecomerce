<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class notabaja extends Model
{
    use HasFactory;
    protected $table = 'notabajas';

    protected $fillable = [
        'total',
        'fechaHora',
        'idempleado',
    ];
}
