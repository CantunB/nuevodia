<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

=======
use App\User;
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
class Mypyme extends Model
{
    protected $table = 'mypymes';
    protected $fillable = [
        'name_commerce',
        'name_owner',
        'name_promoter',
        'distrito',
        'seccion',
        'turn',
        'calle',
        'cruzamiento',
        'no_ext',
        'no_int',
        'colonia',
        'cp',
        'date',
        'votantes',
        'celular',
        'email',
        'social_network',
        'gestion',
        'observation',
        'user_id',
        'areas',
        'trade_status',
        'sympathizer',
        'stay'
    ];
<<<<<<< HEAD
=======
    
    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
}
