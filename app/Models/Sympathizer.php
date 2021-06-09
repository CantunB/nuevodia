<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Sympathizer extends Model
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
    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lider()
    {
        return $this->belongsToMany(Leader::class,'leaders','leader_id');
    }

    public function getLideres_check()
    {
        return $this->belongsToMany(Sympathizer::class, 'leaders', 'leader_id', 'leader_id');
    }

    public function getMovilizadores_check()
    {
        return $this->belongsToMany(Sympathizer::class, 'mobilizers', 'mobilizer_id', 'mobilizer_id');
    }

    public function getTocados_check()
    {
        return $this->belongsToMany(Sympathizer::class, 'tocados', 'tocado_id', 'tocado_id');
    }

    public function movilizador()
    {
        return $this->belongsToMany(Mobilizer::class,'mobilizers','mobilizer_id');
    }

    public function tocado()
    {
        return $this->belongsToMany(Tocados::class,'tocados','tocado_id', 'tocado_id');
    }

    public function liderinfo(){
        return $this->belongsTo(Sympathizer::class,'leader_id');
    }

    public function LiderPivot(){
        return $this->hasOne(Leader::class, 'leader_id','id');
    }
    public function MovilizadorPivot(){
        return $this->hasOne(Mobilizer::class, 'mobilizer_id','id');
    }
    public function TocadoPivot(){
        return $this->hasOne(Tocados::class, 'tocado_id','id');
    }

    public  static function contador(){
        $total =  Sympathizer::count();
        $except = Sympathizer::query()->where('clave_elector', 'LIKE', "%@%")->count();
        return $total = $total - $except;
    }

    public static function countSeccion($seccion){
     return Sympathizer::where('clave_elector', 'not like', "%@%")->select('seccion')->where('seccion', $seccion)->count();
    }

    public static function countGestiones($gestion){
        return Sympathizer::where('clave_elector', 'not like', "%@%")->select('gestion','user_id')->where('gestion', $gestion);
    }
<<<<<<< HEAD
=======

    public function scopeSuemy($query){
        return $query->whereIn('user_id',[3,4]);
    }
    public function scopeEduardo($query){
        return $query->whereIn('user_id',[6,7,9,10]);
    }
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
}
