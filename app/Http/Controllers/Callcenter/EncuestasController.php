<?php

namespace App\Http\Controllers\Callcenter;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\Encuesta;
use App\Models\Sympathizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class EncuestasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
=======
use App\Models\Employee;
use App\Models\Encuesta;
use App\Models\Mypyme;
use App\Models\Pantry;
use App\Models\Sorteos;
use App\Models\Sympathizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EncuestasController  extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_encuestas')->only(['create','store']);
        $this->middleware('role_or_permission:read_encuestas')->only(['index','show']);
        $this->middleware('role_or_permission:update_encuestas')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_encuestas')->only(['destroy']);
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $registro = Sympathizer::where('celular','9381833034')->get();
        //registro = Sympathizer::all()->whereNotNull('celular')->random(1);
        //return $registro['0']->celular;
        $data = Encuesta::with(['getUser'])->select('user_id')->groupBy('user_id')->get();
<<<<<<< HEAD
     
        
  //return  $status_encuesta = array_add($status_encuesta);
       // return $average = $status_encuesta->toArray();
=======


  //return  $status_encuesta = array_add($status_encuesta);
       // return $average = $status_encuesta->toArray();
       if (!isset($encuestadores)) {
        // colección no está vacía
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
        foreach($data as $encuestador)
        {
            $con_ind[] = Encuesta::where('user_id',$encuestador->user_id)->count();
           $encuestadores[] = $encuestador->getUser->nombre;
        }
<<<<<<< HEAD

       // return $encuestadores;        // return $con_ind;
        if ($request->ajax()){
            $registro = Sympathizer::all()->whereNotNull('celular')->random(1);
           //$registro = Sympathizer::where('celular','9381833034')->get();
            if(Encuesta::where('celular', $registro['0']->celular)->exists()) {
                $registro = Sympathizer::all()->whereNotNull('celular')->random(1);
=======
        } else {
       // colección vacía
       $encuestadores = 0;
       $con_ind = 0;
        }


        if ($request->ajax()){

           /* $registro = Sympathizer::whereNotNull('celular')->random(1);
            if(Encuesta::where('celular', $registro['0']->celular)->exists()) {
                $registro = Sympathizer::where('celular','0')->get();
            }else{
                $registro = Sympathizer::whereNotNull('celular')->random(1);
            }*/
            //$registro = Pantry::all()->whereNotNull('celular')->random(1);
           // $registro = Employee::all()->whereNotNull('celular')->random(1);
           //$registro = Mypyme::all()->whereNotNull('celular')->random(1);
           $registro = Sorteos::all()->whereNotNull('celular')->random(1);

            if(Encuesta::where('celular', $registro['0']->celular)->exists()) {
                //$registro = Pantry::where('celular','0')->get();
            //    $registro = Employee::where('celular','0')->get();
               $registro = Sorteos::where('celular','0')->get();
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
            }
                return DataTables::of($registro)
                    ->addIndexColumn()
                    ->addColumn('opciones', function ($registro){
                        $opciones = '';
                        if (Auth::user()->can('read_encuestas')){
                            $opciones .= '<button type="button" class="btn btn-sm action-icon encuesta icon-dual-warning data-toggle="modal" data-target="#EncuestaModal"><i class="mdi mdi-ballot-recount-outline"></i> Encuesta</button>';
                        }
                        return $opciones;
                    })
                ->rawColumns(['opciones'])
                ->toJson();

            }
            return view('callcenter.encuestas.index',compact('encuestadores','con_ind'));
    }

    public function results()
    {
<<<<<<< HEAD
       // return bcrypt('GatoyPerro1234');
=======
       $contador = Encuesta::all();
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
        $estatus_encuesta = Encuesta::select('status_number')->groupBy('status_number')->get();
        $incisos_estatus = [
            0 => 'Colgaron',
            1 => 'Contestaron',
            2 => 'Llame mas tarde',
            3 => 'No respondieron',
            4 => 'Ocupado',
            5 => 'Colgaron',
            6 => 'No existe el número',
        ];
<<<<<<< HEAD
        foreach ($estatus_encuesta as $status) { 
           //return  $incisos_q1 =  $incisos_q1[$status->status_number];
          //  $status_encuesta =  Encuesta::where('status_number', $status->status_number)->count();
           //return $status_encuesta[] = collect([$status->status_number => Encuesta::where('status_number', $status->status_number)->count()]);
            $resultados_estatus[] = array($incisos_estatus[$status->status_number] => Encuesta::where('status_number', $status->status_number)->count());
            //$status_encuesta = [$status->status_number => Encuesta::where('status_number', $status->status_number)->count()];
            //$estatus_encuesta = collect($status_encuesta);
           //$status_encuesta = array($status_encuesta);
=======
        foreach ($estatus_encuesta as $status) {
            $resultados_estatus[] = array($incisos_estatus[$status->status_number] => Encuesta::where('status_number', $status->status_number)->count());
        /*    $resultados_estatus[] = array($incisos_estatus[$status->status_number] => DB::table('sympathizers')
                                                                                        ->join('encuestas', function ($join) {
                                                                                            $join->on('sympathizers.celular', '=', 'encuestas.celular')
                                                                                            ->whereIn('sympathizers.user_id',[3,4]);
                                                                                        })->where('encuestas.status_number', $status->status_number)->count()); */
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
        }
        //return $resultados_q1;
        $encuesta_p1 = Encuesta::select('q1')->groupBy('q1')->get();
        $incisos_q1 = [
            0 => 'No respondieron',
            1 => 'Recuerda la fecha exacta (6 de Junio)',
            2 => 'Sabe que son en Junio',
            3 => 'No piensa votar',
            4 => 'Colgaron',
        ];
        foreach ($encuesta_p1 as $key => $p1) {
            $resultados_q1[] = array($incisos_q1[$key] => Encuesta::where('q1', $p1->q1)->count());
        }

       $encuesta_p2 = Encuesta::select('q2')->groupBy('q2')->get();
        $incisos_q2 = [
            0 => 'No respondieron',
            1 => 'Si piensa votar',
            2 => 'Aun no es seguro',
            3 => 'No piensa votar',
            4 => 'Colgaron',
        ];
        foreach ($encuesta_p2 as $key => $p2) {
            $resultados_q2[] = array($incisos_q2[$key] => Encuesta::where('q2', $p2->q2)->count());
        }

        $encuesta_p3 = Encuesta::select('q3')->groupBy('q3')->get();
        $incisos_q3 = [
            0 => 'No respondieron',
            1 => 'No le convence ningún candidato/partido',
            2 => 'No cree que las elecciones sean limpias y sin trampas',
            3 => 'No estara en la ciudad o trabajará',
            4 => 'No contesto',
        ];
        foreach ($encuesta_p3 as $key => $p3) {
            $resultados_q3[] = array($incisos_q3[$key] => Encuesta::where('q3', $p3->q3)->count());
        }

        $encuesta_p4 = Encuesta::select('q4')->groupBy('q4')->get();
        $incisos_q4 = [
            0 => 'No respondieron',
            1 => ' Sí lo ha decidido',
            2 => 'Aún no lo ha decidido',
            3 => 'No contesto',
           // 4 => 'No contesto',
        ];
        foreach ($encuesta_p4 as $key => $p4) {
            $resultados_q4[] = array($incisos_q4[$key] => Encuesta::where('q4', $p4->q4)->count());
        }

        $encuesta_p5 = Encuesta::select('q5')->groupBy('q5')->get();
        $encuesta_p6 = Encuesta::select('q6')->groupBy('q6')->get();
        $encuesta_p7 = Encuesta::select('q7')->groupBy('q7')->get();
        $encuesta_p8 = Encuesta::select('q8')->groupBy('q8')->get();
        $encuesta_p9 = Encuesta::select('q9')->groupBy('q9')->get();
        $encuesta_p10 = Encuesta::select('q10')->groupBy('q10')->get();

        $incisos_candidatos = [
            0 => 'No respondieron',
            1 => 'Óscar Rosa Gonzales (PRI, PAN, PRD)',
            2 => 'Pablo Gutierrez Lazarus (MORENA)',
            3 => 'Alejandro Coba (MOVIMIENTO CIUDADANO)',
            4 => 'Arturo Laureano (FUERZA POR MEXICO)',
            5 => 'Isabel Espinoza (Partido Verde Ecologista de México)',
            6 => 'Miguel Gutiérrez (PT)',
            7 => 'Ninguno',
            8 => 'Es secreto',
            9 => 'No respondieron'
<<<<<<< HEAD
 
=======

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
        ];
        foreach ($encuesta_p5 as $key => $p5) {
            $resultados_q5[] = array($incisos_candidatos[$key] => Encuesta::where('q5', $p5->q5)->count());
        }
        foreach ($encuesta_p6 as $key => $p6) {
            $resultados_q6[] = array($incisos_candidatos[$key] => Encuesta::where('q6', $p6->q6)->count());
        }
        foreach ($encuesta_p7 as $key => $p7) {
            $resultados_q7[] = array($incisos_candidatos[$key] => Encuesta::where('q7', $p7->q7)->count());
        }
        foreach ($encuesta_p8 as $key => $p8) {
            $resultados_q8[] = array($incisos_candidatos[$key] => Encuesta::where('q8', $p8->q8)->count());
        }
        foreach ($encuesta_p9 as $key => $p9) {
            $resultados_q9[] = array($incisos_candidatos[$key] => Encuesta::where('q9', $p9->q9)->count());
        }
        foreach ($encuesta_p10 as $key => $p10) {
            $resultados_q10[] = array($incisos_candidatos[$key] => Encuesta::where('q10', $p10->q10)->count());
        }

<<<<<<< HEAD
        return view('callcenter.encuestas.results', 
            compact('resultados_estatus',
            'resultados_q1',
            'resultados_q2', 
=======
        return view('callcenter.encuestas.results',
            compact(
            'contador',
            'resultados_estatus',
            'resultados_q1',
            'resultados_q2',
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
            'resultados_q3',
            'resultados_q4',
            'resultados_q5',
            'resultados_q6',
            'resultados_q7',
            'resultados_q8',
            'resultados_q9',
<<<<<<< HEAD
            'resultados_q10',
        ));
=======
            'resultados_q10'
                ));
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function create()
    {
        //
=======
    public function details()
    {
    $cc_s = Sympathizer::whereNotNull('celular')->whereIn('user_id',[3,4])->count();
    $cc_e = Sympathizer::whereNotNull('celular')->whereIn('user_id',[6,7,9,10])->count();
    $cc_d = Pantry::whereNotNull('celular')->count();


    $estatus_encuesta = Encuesta::select('status_number')->groupBy('status_number')->get();
    $incisos_estatus = [
        0 => 'Colgaron',
        1 => 'Contestaron',
        2 => 'Llame mas tarde',
        3 => 'No respondieron',
        4 => 'Ocupado',
        5 => 'Colgaron',
        6 => 'No existe el número',
    ];
    foreach ($estatus_encuesta as $status) {
        $re_cc_s[] = array($incisos_estatus[$status->status_number] => DB::table('sympathizers')
                                                                                    ->join('encuestas', function ($join) {
                                                                                        $join->on('sympathizers.celular', '=', 'encuestas.celular')
                                                                                        ->whereIn('sympathizers.user_id',[3,4]);
                                                                                    })->where('encuestas.status_number', $status->status_number)->count());
        $re_cc_e[] = array($incisos_estatus[$status->status_number] => DB::table('sympathizers')
                                                                                    ->join('encuestas', function ($join) {
                                                                                        $join->on('sympathizers.celular', '=', 'encuestas.celular')
                                                                                        ->whereIn('sympathizers.user_id',[6,7,9,10]);
                                                                                    })->where('encuestas.status_number', $status->status_number)->count());
        $re_cc_d[] = array($incisos_estatus[$status->status_number] => DB::table('pantries')
                                                                                    ->join('encuestas', function ($join) {
                                                                                        $join->on('pantries.celular', '=', 'encuestas.celular');
                                                                                    })->where('encuestas.status_number', $status->status_number)->count());
}

    $encuesta_p1 = Encuesta::select('q1')->groupBy('q1')->get();
        $incisos_q1 = [
            0 => 'No respondieron',
            1 => 'Recuerda la fecha exacta (6 de Junio)',
            2 => 'Sabe que son en Junio',
            3 => 'No piensa votar',
            4 => 'Colgaron',
        ];
        foreach ($encuesta_p1 as $key => $p1) {
            $rq1_s[] = array($incisos_q1[$key] => DB::table('sympathizers')
                                                    ->join('encuestas', function ($join) {
                                                        $join->on('sympathizers.celular', '=', 'encuestas.celular')
                                                        ->whereIn('sympathizers.user_id',[3,4]);
                                                    })
                                                    ->where('q1', $p1->q1)
                                                    ->where('status_number','1')->count());
            $rq1_e[] = array($incisos_q1[$key] => DB::table('sympathizers')
                                                    ->join('encuestas', function ($join) {
                                                        $join->on('sympathizers.celular', '=', 'encuestas.celular')
                                                        ->whereIn('sympathizers.user_id',[6,7,9,10]);
                                                    })
                                                    ->where('q1', $p1->q1)
                                                    ->where('status_number','1')->count());
                                                    $rq1_d[] = array($incisos_q1[$key] => DB::table('pantries')
                                                    ->join('encuestas', function ($join) {
                                                        $join->on('pantries.celular', '=', 'encuestas.celular');
                                                    })
                                                    ->where('q1', $p1->q1)
                                                    ->where('status_number','1')->count());
        }
        $encuesta_p2 = Encuesta::select('q2')->groupBy('q2')->get();
        $incisos_q2 = [
            0 => 'No respondieron',
            1 => 'Si piensa votar',
            2 => 'Aun no es seguro',
            3 => 'No piensa votar',
            4 => 'Colgaron',
        ];
        foreach ($encuesta_p2 as $key => $p2) {
           // $resultados_q2[] = array($incisos_q2[$key] => Encuesta::where('q2', $p2->q2)->count());
           $rq2_s[] = array($incisos_q2[$key] => DB::table('sympathizers')
                                                    ->join('encuestas', function ($join) {
                                                        $join->on('sympathizers.celular', '=', 'encuestas.celular')
                                                        ->whereIn('sympathizers.user_id',[3,4]);
                                                    })
                                                    ->where('q2', $p2->q2)
                                                    ->where('status_number','1')->count());
            $rq2_e[] = array($incisos_q2[$key] => DB::table('sympathizers')
            ->join('encuestas', function ($join) {
                $join->on('sympathizers.celular', '=', 'encuestas.celular')
                ->whereIn('sympathizers.user_id',[6,7,9,10]);
            })
            ->where('q2', $p2->q2)
            ->where('status_number','1')->count());

            $rq2_d[] = array($incisos_q2[$key] => DB::table('pantries')
            ->join('encuestas', function ($join) {
                $join->on('pantries.celular', '=', 'encuestas.celular');
            })
            ->where('q2', $p2->q2)
            ->where('status_number','1')->count());
        }
        $encuesta_p3 = Encuesta::select('q3')->groupBy('q3')->get();
        $incisos_q3 = [
            0 => 'No respondieron',
            1 => 'No le convence ningún candidato/partido',
            2 => 'No cree que las elecciones sean limpias y sin trampas',
            3 => 'No estara en la ciudad o trabajará',
            4 => 'No contesto',
        ];
        foreach ($encuesta_p3 as $key => $p3) {
           // $resultados_q3[] = array($incisos_q3[$key] => Encuesta::where('q3', $p3->q3)->count());
           $rq3_s[] = array($incisos_q3[$key] => DB::table('sympathizers')
                                            ->join('encuestas', function ($join) {
                                                $join->on('sympathizers.celular', '=', 'encuestas.celular')
                                                ->whereIn('sympathizers.user_id',[3,4]);
                                            })
                                            ->where('q3', $p3->q3)
                                            ->where('status_number','1')->count());
            $rq3_e[] = array($incisos_q3[$key] => DB::table('sympathizers')
            ->join('encuestas', function ($join) {
                                                $join->on('sympathizers.celular', '=', 'encuestas.celular')
                                                ->whereIn('sympathizers.user_id',[6,7,9,10]);
                                            })
                                            ->where('q3', $p3->q3)
                                            ->where('status_number','1')->count());
            $rq3_d[] = array($incisos_q3[$key] => DB::table('pantries')
                                            ->join('encuestas', function ($join) {
                                                                                $join->on('pantries.celular', '=', 'encuestas.celular');
                                                                            })
                                                                            ->where('q3', $p3->q3)
                                                                            ->where('status_number','1')->count());
        }
        $encuesta_p4 = Encuesta::select('q4')->groupBy('q4')->get();
        $incisos_q4 = [
            0 => 'No respondieron',
            1 => ' Sí lo ha decidido',
            2 => 'Aún no lo ha decidido',
            3 => 'No contesto',
           // 4 => 'No contesto',
        ];
        foreach ($encuesta_p4 as $key => $p4) {
          //  $resultados_q4[] = array($incisos_q4[$key] => Encuesta::where('q4', $p4->q4)->count());
          $rq4_s[] = array($incisos_q4[$key] => DB::table('sympathizers')
                                                ->join('encuestas', function ($join) {
                                                    $join->on('sympathizers.celular', '=', 'encuestas.celular')
                                                    ->whereIn('sympathizers.user_id',[3,4]);
                                                })
                                                ->where('q4', $p4->q4)
                                                ->where('status_number','1')->count());
          $rq4_e[] = array($incisos_q4[$key] => DB::table('sympathizers')
                                                ->join('encuestas', function ($join) {
                                                    $join->on('sympathizers.celular', '=', 'encuestas.celular')
                                                    ->whereIn('sympathizers.user_id',[6,7,9,10]);
                                                })
                                                ->where('q4', $p4->q4)
                                                ->where('status_number','1')->count());
                                                $rq4_d[] = array($incisos_q4[$key] => DB::table('pantries')
                                                ->join('encuestas', function ($join) {
                                                    $join->on('pantries.celular', '=', 'encuestas.celular');
                                                })
                                                ->where('q4', $p4->q4)
                                                ->where('status_number','1')->count());
        }
        $encuesta_p5 = Encuesta::select('q5')->groupBy('q5')->get();
        $encuesta_p6 = Encuesta::select('q6')->groupBy('q6')->get();
        $encuesta_p7 = Encuesta::select('q7')->groupBy('q7')->get();
        $encuesta_p8 = Encuesta::select('q8')->groupBy('q8')->get();
        $encuesta_p9 = Encuesta::select('q9')->groupBy('q9')->get();
        $encuesta_p10 = Encuesta::select('q10')->groupBy('q10')->get();

        $incisos_candidatos = [
            0 => 'No respondieron',
            1 => 'Óscar Rosa Gonzales (PRI, PAN, PRD)',
            2 => 'Pablo Gutierrez Lazarus (MORENA)',
            3 => 'Alejandro Coba (MOVIMIENTO CIUDADANO)',
            4 => 'Arturo Laureano (FUERZA POR MEXICO)',
            5 => 'Isabel Espinoza (Partido Verde Ecologista de México)',
            6 => 'Miguel Gutiérrez (PT)',
            7 => 'Ninguno',
            8 => 'Es secreto',
            9 => 'No respondieron'
        ];
        foreach ($encuesta_p5 as $key => $p5) {
            //$resultados_q5[] = array($incisos_candidatos[$key] => Encuesta::where('q5', $p5->q5)->count());
            $rq5_s[] = array($incisos_candidatos[$key] => DB::table('sympathizers')
                                                ->join('encuestas', function ($join) {
                                                    $join->on('sympathizers.celular', '=', 'encuestas.celular')
                                                    ->whereIn('sympathizers.user_id',[3,4]);
                                                })
                                                ->where('q5', $p5->q5)
                                                ->where('status_number','1')->count());
                                                $rq5_e[] = array($incisos_candidatos[$key] => DB::table('sympathizers')
                                                ->join('encuestas', function ($join) {
                                                    $join->on('sympathizers.celular', '=', 'encuestas.celular')
                                                    ->whereIn('sympathizers.user_id',[6,7,9,10]);
                                                })
                                                ->where('q5', $p5->q5)
                                                ->where('status_number','1')->count());
                                                $rq5_d[] = array($incisos_candidatos[$key] => DB::table('pantries')
                                                ->join('encuestas', function ($join) {
                                                    $join->on('pantries.celular', '=', 'encuestas.celular');
                                                })
                                                ->where('q5', $p5->q5)
                                                ->where('status_number','1')->count());
        }
        foreach ($encuesta_p6 as $key => $p6) {
           // $resultados_q6[] = array($incisos_candidatos[$key] => Encuesta::where('q6', $p6->q6)->count());
            $rq6_s[] = array($incisos_candidatos[$key] => DB::table('sympathizers')
            ->join('encuestas', function ($join) {
                $join->on('sympathizers.celular', '=', 'encuestas.celular')
                ->whereIn('sympathizers.user_id',[3,4]);
            })
            ->where('q6', $p6->q6)
            ->where('status_number','1')->count());
            $rq6_e[] = array($incisos_candidatos[$key] => DB::table('sympathizers')
            ->join('encuestas', function ($join) {
                $join->on('sympathizers.celular', '=', 'encuestas.celular')
                ->whereIn('sympathizers.user_id',[6,7,9,10]);
            })
            ->where('q6', $p6->q6)
            ->where('status_number','1')->count());
            $rq6_d[] = array($incisos_candidatos[$key] => DB::table('pantries')
            ->join('encuestas', function ($join) {
                $join->on('pantries.celular', '=', 'encuestas.celular');
            })
            ->where('q6', $p6->q6)
            ->where('status_number','1')->count());
        }
        foreach ($encuesta_p7 as $key => $p7) {
            //$resultados_q7[] = array($incisos_candidatos[$key] => Encuesta::where('q7', $p7->q7)->count());
            $rq7_s[] = array($incisos_candidatos[$key] => DB::table('sympathizers')
            ->join('encuestas', function ($join) {
                $join->on('sympathizers.celular', '=', 'encuestas.celular')
                ->whereIn('sympathizers.user_id',[3,4]);
            })
            ->where('q7', $p7->q7)
            ->where('status_number','1')->count());
            $rq7_e[] = array($incisos_candidatos[$key] => DB::table('sympathizers')
            ->join('encuestas', function ($join) {
                $join->on('sympathizers.celular', '=', 'encuestas.celular')
                ->whereIn('sympathizers.user_id',[6,7,9,10]);
            })
            ->where('q7', $p7->q7)
            ->where('status_number','1')->count());
            $rq7_d[] = array($incisos_candidatos[$key] => DB::table('pantries')
            ->join('encuestas', function ($join) {
                $join->on('pantries.celular', '=', 'encuestas.celular');
            })
            ->where('q7', $p7->q7)
            ->where('status_number','1')->count());
        }
        foreach ($encuesta_p8 as $key => $p8) {
            //$resultados_q8[] = array($incisos_candidatos[$key] => Encuesta::where('q8', $p8->q8)->count());
            $rq8_s[] = array($incisos_candidatos[$key] => DB::table('sympathizers')
            ->join('encuestas', function ($join) {
                $join->on('sympathizers.celular', '=', 'encuestas.celular')
                ->whereIn('sympathizers.user_id',[3,4]);
            })
            ->where('q8', $p8->q8)
            ->where('status_number','1')->count());
            $rq8_e[] = array($incisos_candidatos[$key] => DB::table('sympathizers')
            ->join('encuestas', function ($join) {
                $join->on('sympathizers.celular', '=', 'encuestas.celular')
                ->whereIn('sympathizers.user_id',[6,7,9,10]);
            })
            ->where('q8', $p8->q8)
            ->where('status_number','1')->count());
            $rq8_d[] = array($incisos_candidatos[$key] => DB::table('pantries')
            ->join('encuestas', function ($join) {
                $join->on('pantries.celular', '=', 'encuestas.celular');
            })
            ->where('q8', $p8->q8)
            ->where('status_number','1')->count());
        }
        foreach ($encuesta_p9 as $key => $p9) {
            //$resultados_q9[] = array($incisos_candidatos[$key] => Encuesta::where('q9', $p9->q9)->count());
            $rq9_s[] = array($incisos_candidatos[$key] => DB::table('sympathizers')
            ->join('encuestas', function ($join) {
                $join->on('sympathizers.celular', '=', 'encuestas.celular')
                ->whereIn('sympathizers.user_id',[3,4]);
            })
            ->where('q9', $p9->q9)
            ->where('status_number','1')->count());
            $rq9_e[] = array($incisos_candidatos[$key] => DB::table('sympathizers')
            ->join('encuestas', function ($join) {
                $join->on('sympathizers.celular', '=', 'encuestas.celular')
                ->whereIn('sympathizers.user_id',[6,7,9,10]);
            })
            ->where('q9', $p9->q9)
            ->where('status_number','1')->count());
            $rq9_d[] = array($incisos_candidatos[$key] => DB::table('pantries')
            ->join('encuestas', function ($join) {
                $join->on('pantries.celular', '=', 'encuestas.celular');
            })
            ->where('q9', $p9->q9)
            ->where('status_number','1')->count());
        }
        foreach ($encuesta_p10 as $key => $p10) {
            //resultados_q10[] = array($incisos_candidatos[$key] => Encuesta::where('q10', $p10->q10)->count());
            $rq10_s[] = array($incisos_candidatos[$key] => DB::table('sympathizers')
            ->join('encuestas', function ($join) {
                $join->on('sympathizers.celular', '=', 'encuestas.celular')
                ->whereIn('sympathizers.user_id',[3,4]);
            })
            ->where('q10', $p10->q10)
            ->where('status_number','1')->count());

            $rq10_e[] = array($incisos_candidatos[$key] => DB::table('sympathizers')
            ->join('encuestas', function ($join) {
                $join->on('sympathizers.celular', '=', 'encuestas.celular')
                ->whereIn('sympathizers.user_id',[6,7,9,10]);
            })
            ->where('q10', $p10->q10)
            ->where('status_number','1')->count());

            $rq10_d[] = array($incisos_candidatos[$key] => DB::table('pantries')
            ->join('encuestas', function ($join) {
                $join->on('pantries.celular', '=', 'encuestas.celular');
            })
            ->where('q10', $p10->q10)
            ->where('status_number','1')->count());
        }

        return view('callcenter.encuestas.detalles',compact(
            'cc_s',
        'cc_e',
        'cc_d',
        're_cc_s',
        're_cc_e',
        're_cc_d',
        'rq1_s',
        'rq2_s',
        'rq3_s',
        'rq4_s',
        'rq5_s',
        'rq6_s',
        'rq7_s',
        'rq8_s',
        'rq9_s',
        'rq10_s',
        'rq1_e',
        'rq2_e',
        'rq3_e',
        'rq4_e',
        'rq5_e',
        'rq6_e',
        'rq7_e',
        'rq8_e',
        'rq9_e',
        'rq10_e',
        'rq1_d',
        'rq2_d',
        'rq3_d',
        'rq4_d',
        'rq5_d',
        'rq6_d',
        'rq7_d',
        'rq8_d',
        'rq9_d',
        'rq10_d'





        ));
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Encuesta::create($request->all());
        return redirect()->route('Encuestas.index')->with('status_success','Encuesta Almacenada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
