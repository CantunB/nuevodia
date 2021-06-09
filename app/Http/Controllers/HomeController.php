<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Leader;
use App\Models\Mobilizer;
use App\Models\Sympathizer;
use App\Models\Tocados;
use App\User;
use Carbon\Exceptions\OutOfRangeException;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return bcrypt('BCantun97.-');
        if (Auth::user()->hasRole(['Super Admin','administrador'])){

        $dias = array("DOM","LUN","MAR","MIE","JUE","VIE","SAB");
        $total_simpatizantes =  Sympathizer::contador();
        $total_lideres = Leader::contador();
        $total_movilizadores = Mobilizer::contador();
        $total_tocados = Tocados::contador();
        $usuarios = User::where('estatus','=',1)->get();
       // User::where('username', 'not like', "%ray%")->get();
<<<<<<< HEAD
         $gestiones_completas = Sympathizer::where('estatus_gestion','COMPLETA')->where('clave_elector', 'not like', "%@%")->count();
         $gestiones_incompletas = Sympathizer::whereNull('estatus_gestion')->where('clave_elector', 'not like', "%@%")->count();
         $gestiones = [$gestiones_incompletas, $gestiones_completas];
      //$hoy = date("d");

        $fecha = new DateTime("02/8/2021");
        $semana = $fecha->format("W");

      //  return "Semana: ".$semana;
      //return $numeroSemana = date("W");

      $hoy = Carbon::today();
=======
        $gestiones_completas = Sympathizer::where('estatus_gestion','COMPLETA')->where('clave_elector', 'not like', "%@%")->count();
        $gestiones_incompletas = Sympathizer::whereNull('estatus_gestion')->where('clave_elector', 'not like', "%@%")->count();
        $gestiones = [$gestiones_incompletas, $gestiones_completas];
      //$hoy = date("d");
        $fecha = new DateTime("02/8/2021");
        $semana = $fecha->format("W");
      //  return "Semana: ".$semana;
      //return $numeroSemana = date("W");
        $hoy = Carbon::today();
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    //return   $dia = date("w");
        $weekMap = [
            0 => 'SU',
            1 => 'MO',
            2 => 'TU',
            3 => 'WE',
            4 => 'TH',
            5 => 'FR',
            6 => 'SA',
        ];
        $lastweek = [
            0 => new Carbon('last sunday'),
            1 => new Carbon('last monday'),
            2 => new Carbon('last tuesday'),
            3 => new Carbon('last wednesday'),
            4 => new Carbon('last thursday'),
            5 => new Carbon('last friday'),
            6 => new Carbon('last saturday'),
        ];
        foreach($lastweek as $key => $last){
            $cont_last[] = Sympathizer::whereDate('created_at',$last)->count();
        }

        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $weekday = $weekMap[$dayOfTheWeek];
        //return $hoy;
        $sim_day = Sympathizer::whereDate('created_at',Carbon::today())->count();
       // whereDate('created_at', Carbon::today())->get();
        $lid_day = Leader::whereDate('created_at',Carbon::today())->count();
        $mov_day = Mobilizer::whereDate('created_at',Carbon::today())->count();
        $toc_day = Tocados::whereDate('created_at',Carbon::today())->count();
       // return $simpatizantes;
      //  return $total_lideres;
        return view('home',compact(
            'dias',
            'cont_last',
            'gestiones',
            'total_simpatizantes',
            'total_lideres',
            'total_movilizadores',
            'total_tocados',
            'sim_day',
            'lid_day',
            'mov_day',
            'toc_day',
            'usuarios'
        ));
        //return $departments = Coordination::getDepartments($coordination);
    }elseif(Auth::user()->hasRole(['CapturistasA'])){
        return redirect()->route('Leaders.index');
    }
    elseif (Auth::user()->hasRole(['callcenter'])){
        return redirect()->route('CallCenter.index');
        }
    elseif (Auth::user()->hasRole(['CapturistasB'])){
        return redirect()->route('Distribuidores.index');
    }
    elseif (Auth::user()->hasRole(['CapturistasC'])){
        return redirect()->route('Leaders.index');
    }
    elseif (Auth::user()->hasRole(['empresas'])){
        return redirect()->route('Empresas.index');
    }
    elseif (Auth::user()->hasRole(['mypymes'])){
        return redirect()->route('Mypymes.index');
    }
    elseif (Auth::user()->hasRole(['GESTIONES'])){
        return redirect()->route('Gestiones.index');
    }
<<<<<<< HEAD
=======
    elseif (Auth::user()->hasRole(['despensas'])){
        return redirect()->route('Despensas.index');
    }
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)

    }
}

