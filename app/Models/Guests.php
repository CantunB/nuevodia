<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
    protected $table = 'invitados';

    public function getCoordinador(){
        return $this->belongsTo(Coordinators::class, 'id_coordinador');
    }
}
