<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//se establece una relacion de pertenece a para vincular los mensajes a un usuario
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    use HasFactory;
    //se agregan un arreglo de los campos que pueden ser modificados
    protected $fillable = [
        'message',
    ];

    //funcion que devuelve los mensajes que pertenence a un usuario    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
