<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tocados extends Model
{
   // use SoftDeletes;
    protected $fillable = [
        'tocado_id',
        'mobilizer_id',
        'user_id'
    ];

    public function getInfo(){
        return $this->belongsTo(Sympathizer::class,'tocado_id');
    }

    public static function getTocadoGestionado($tocado)
    {
        return Sympathizer::where('id',$tocado)->where('estatus_gestion','COMPLETA');
    }

    public function movilizadores(){
        return $this->belongsTo(Sympathizer::class,'mobilizer_id');
    }

    public function getLider(){
        return $this->belongsTo(Mobilizer::class,'mobilizer_id');
    }

    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getMovilizador(){
        return $this->belongsTo( Mobilizer::class, 'mobilizer_id');
    }

    public static function contador(){
        return Tocados::count();
    }

    /**
     * The roles that belong to the Tocados
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getPollsConfirmation()
    {
        return $this->belongsTo(ConfirmationResult::class, 'tocado_id', 'tocado_id', 'tocado_id');
    }
}
