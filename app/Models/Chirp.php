<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    use HasFactory;
    //se agregan un arreglo de los campos que pueden ser modificados
    protected $fillable = [
        'message',
    ];
}
