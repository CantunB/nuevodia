<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leader extends Model
{
    protected $primaryKey = 'id';
    //use SoftDeletes;
    protected $fillable = [
        'leader_id',
        'user_id',
    ];

    public static function simpatizante($user_id){
        return Sympathizer::where('user_id',$user_id)->get();
    }

    public function lider(){
        return $this->belongsTo(Sympathizer::class,'leader_id');
    }

    public function getInfo(){
        return $this->belongsTo(Sympathizer::class,'leader_id');
    }

    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getMovilizadores($lider)
    {
        return Mobilizer::where('leader_id',$lider)->get();
    }

    public static function contador(){
        return Leader::count();
    }

    public function getLiderInfo()
    {
        return $this->belongsTo(Sympathizer::class, 'leader_id');
    }

    public static function getMovilizadoresGestion($mobilizer)
    {
        return Mobilizer::where('mobilizer_id',$mobilizer)->get();
    }

    public static function getLideresReportGral()
    {

    }

    /** FUNCION PARA OBTENER LOS MOVILIZIDAORES EN LA VISTA DE REPORTES GENERAL EN EXCEL */
    public static function getMovilizadoresReportGral($lider)
    {
        return Mobilizer::where('leader_id',$lider)->get();
    }
    /** FUNCION PARA OBTENER LOS TOCADOS EN LA VISTA DE REPORTES GENERAL EN EXCEL */
    public static function getTocadosReportGral($mobilizer)
    {
        return Tocados::where('mobilizer_id',$mobilizer)->get();
    }

    /** FUNCION PARA OBTENER LOS LIDERES EN EL REPORTE INDIVIDUAL DE EXCEL POR USUARIO */
    public static function getLideresReportIndividual($user)
    {
        return Leader::where('user_id', $user)->get();
    }
    /**FUNCION PARA OBTENER LOS MOVILIZADORES EN EL REPORTE INDIVIDUAL DE EXCEL POR USUARIO */
    public static function getMovilizadoresReportIndividual($user)
    {
        return Mobilizer::where('user_id',$user)->get();
    }
    /** FUNCION PARA OBTENER LOS TOCADOS EN EL REPORTE INDIVIDUAL DE EXCEL POR USUARIO */
    public static function getTocadosReportIndividual($user)
    {
        return Tocados::where('user_id',$user)->get();
    }
    public static function getTocadoGestionado($tocado)
    {
        return Sympathizer::where('id',$tocado)->where('estatus_gestion','COMPLETA');
    }
}
