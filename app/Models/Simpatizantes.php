<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Simpatizantes extends Model
{
    //use SoftDeletes;
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
        'facebook',
        'gestion',
        'estatus_gestion',
        'observacion',
        'user_id'
    ];


}
