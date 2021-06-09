<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'distrito',
    ];

    public  static function contador($distrito){
        return Sympathizer::where('clave_elector', 'not like', "%@%")->select('distrito')->where('distrito',$distrito)->count();
    }
    public  static function contadorSecciones($distrito){
        return Sympathizer::where('clave_elector', 'not like', "%@%")->select('secciones')->where('distrito',$distrito)->count();
    }

    public static function getSecciones($distrito){
        return Distritacion::where('distrito_electoral',$distrito)->get();
    }

}
