<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Pantry extends Model
{
    protected $table = 'pantries';
    protected $fillable = [
        'clave_elector',
        'nombre',
        'paterno',
        'materno',
        'distrito',
        'seccion',
        'calle',
        'cruzamiento',
        'no_ext',
        'no_int',
        'colonia',
        'cp',
        'fe_nacimiento',
        'celular',
        'email',
        'pantry',
        'image',
        'status_pantry',
        'status',
        'user_id'
    ];

    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
