<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobilizer extends Model
{
   // use SoftDeletes;
    protected $fillable = [
        'leader_id',
        'mobilizer_id',
        'user_id'
    ];

    public function getInfo()
    {
        return $this->belongsTo(Sympathizer::class,'mobilizer_id');
    }

    public function getInfoLider()
    {
        return $this->belongsTo(Sympathizer::class ,'leader_id');
    }
    public function getLid()
    {
     return $this->belongsTo( Leader::class,'id','id');
    }

    public function getLider(){
        return $this->belongsTo( Leader::class, 'leader_id');
    }

    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function contador(){
        return Mobilizer::count();
    }

    public static function getTocados($movilizador)
    {
        return Tocados::where('mobilizer_id',$movilizador)->get();
    }
}
