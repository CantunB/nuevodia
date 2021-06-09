<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ln extends Model
{
    protected $table = 'ln';

    public  static function SeccionCount($seccion){
      return  Ln::select('seccion')->groupBy('seccion')->where('seccion',$seccion)->count();
    }
}
