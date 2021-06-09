<?php

namespace App\Http\Controllers;

use App\Gestiones;
use App\Models\Encuesta;
use App\Models\Leader;
use App\Models\Mobilizer;
use App\Models\Sympathizer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class GestionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
<<<<<<< HEAD
=======
        $this->middleware('role_or_permission:create_gestiones')->only(['create','store']);
        $this->middleware('role_or_permission:read_gestiones')->only(['index','show']);
        $this->middleware('role_or_permission:update_gestiones')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_gestiones')->only(['destroy']);
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $laminas = Sympathizer::where('gestion', 'like', '%' .'LAMI'. '%')
        ->join('encuestas', function ($join) {
            $join->on('sympathizers.celular', '=', 'encuestas.celular')
            ->whereIn('sympathizers.user_id',[3,4])
            ->where('encuestas.q5','!=','opcion1');
        })->get();

        $actualizado = Sympathizer::select('updated_at')->groupBy(DB::raw("DATE_FORMAT(updated_at, '%Y-%m-%d')"))->get();
        foreach($actualizado as $key => $date){
            $gestiones[] = Sympathizer::whereDate('updated_at',$date->updated_at)->where('estatus_gestion','COMPLETA')->count();
        }
        //return Sympathizer::where('clave_elector', 'not like', "%@%")->select('gestion','estatus_gestion')->groupBy('gestion')->get();
        if ($request->ajax()){
            $gestiones = Sympathizer::where('clave_elector', 'not like', "%@%")->whereNotNull('gestion')->select('gestion','estatus_gestion','user_id')->groupBy('gestion');
            return DataTables::of($gestiones)
                ->editColumn('gestion', function ($gestiones){
                    return '<button type="button" class="btn btn-soft-success btninfo action-icon"><i class="mdi mdi-human-wheelchair icon-dual-primary"></i></button> '.$gestiones->gestion.'' ;
                })
                ->editColumn('infogestion', function ($gestiones){
                    return $gestiones->gestion;
                })
                ->addColumn('contador', function (Sympathizer $gestiones){
                    return Sympathizer::countGestiones($gestiones->gestion)->count();
                })
                ->addColumn('capturo', function ($gestiones){
                    $gestionxuser = Sympathizer::countGestiones($gestiones->gestion)->groupBy('user_id')->get();
                    $button = '<button class="btn action-icon icon-dual-blue "><i class="mdi mdi-plus icons-sm"</i></button>';
                     $gestionxuser = $gestionxuser->pluck('user_id');
                     //$countgestionxuser = $gestionxuser->count();
                    foreach ($gestionxuser as $user){
                        $usuarios[] = User::where('id',$user)->first();
                         $gestionesrealizadas[] = Sympathizer::where('gestion', $gestiones->gestion)->where('user_id', $user)->count();
                    }
                    $lista = '<ul>';
                    for( $i = 0; $i < count($gestionxuser); $i++){
                        $lista .= '<li>'. $usuarios[$i]->nombre.' : '.'<strong>'.$gestionesrealizadas[$i].'</strong></li>';
                    }
                    $lista .= '</ul>';
                    return $lista;
                })
                ->rawColumns(['gestion','capturo'])
                ->make(true);
        }

        return view('gestiones.index', compact('actualizado','gestiones', 'laminas'));
    }

    public function getData(Request $request)
    {
/*        return response()->json([
            $lista_gestiones => $lista_gestiones,
        ], 200);
        */
            DB::statement(DB::raw('set @rownum=0'));
            $lista = Sympathizer::where('clave_elector', 'not like', "%@%")
                ->where('gestion',$request->infogestion)
                ->select(
                    DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                    DB::raw("CONCAT(sympathizers.nombre,' ',sympathizers.paterno,' ',sympathizers.materno) as fullname"),
                    'sympathizers.gestion',
                    DB::raw('sympathizers.estatus_gestion'),
                    'sympathizers.user_id',
                    )
                    ->get();
            return response()->json([
                'data' => $lista,
            ], 200);
    }

    public function Gestiones(Request $request)
    {
        if ($request->ajax()){
            if (Auth::user()->hasRole(['Super Admin','administrador'])){
               // $sympathizers = Sympathizer::with(['getUser']);
               $sympathizers = Sympathizer::with(['getUser']);
            }else{
                $sympathizers = Sympathizer::with(['getUser']);
            }
            return DataTables::of($sympathizers)
            ->editColumn('nombre', function ($sympathizers){
                return $sympathizers->nombre .' '.  $sympathizers->paterno .' '. $sympathizers->materno;
            })
            ->filterColumn('nombre', function($query, $keyword) {
                $query->whereRaw("CONCAT(COALESCE(`nombre`,''), COALESCE(`paterno`,''), COALESCE(`materno`,'')) like ?", ["%{$keyword}%"]);
            })
            ->addColumn('estatus', function ($sympathizers){
                if($sympathizers->estatus_gestion === null && $sympathizers->gestion != null){
                    return  '<span class="badge badge-secondary">POR GESTIONAR</span>';
                }if($sympathizers->estatus_gestion === null && $sympathizers->gestion === null){
                    return  '<span class="badge badge-blue">SIN GESTION</span>';
                }if($sympathizers->estatus_gestion === "POR GESTIONAR"){
                    return  '<span class="badge badge-secondary">POR GESTIONAR</span>';
                }if($sympathizers->estatus_gestion === "SIN GESTION"){
                return  '<span class="badge badge-blue">SIN GESTION</span>';
                }elseif($sympathizers->estatus_gestion === "COMPLETA"){
                    return  ' <span class="badge badge-success">COMPLETA</span>';
                }else{
                    return  '<span class="badge badge-secondary">POR GESTIONAR</span>';
                }
            })
            ->addColumn('opciones', function ($sympathizers){
                $opciones = '';
                if (Auth::user()->can('read_gestiones')){
                    if($sympathizers->estatus_gestion != 'COMPLETA' && $sympathizers->gestion != null ){
                        $opciones .= '<button type="button" class="btn btn-sm action-icon actualizar icon-dual-blue"><i class="mdi mdi-check-bold"></i></button>';
                    }
                }
                if (Auth::user()->can('read_gestiones')){
<<<<<<< HEAD
                    $opciones .= '<button type="button" class="btn btn-sm action-icon show icon-dual-ligth"><i class="mdi mdi-eye"></i></button>';
                }
                if (Auth::user()->can('read_gestiones')){
=======
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    $opciones .= '<button type="button" class="btn btn-sm action-icon editar icon-dual-warning"><i class="mdi mdi-arrow-up-bold-circle"></i></button>';
                }
                return $opciones;
            })
            ->rawColumns(['opciones','estatus'])
            ->toJson();
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gestiones  $gestiones
     * @return \Illuminate\Http\Response
     */
    public function show(Gestiones $gestiones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gestiones  $gestiones
     * @return \Illuminate\Http\Response
     */
    public function edit(Gestiones $gestiones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gestiones  $gestiones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $simpatizante = Sympathizer::findOrFail($id);
        $simpatizante->update($request->all());
        if ($simpatizante == true){
            $success = true;
            $message = "GESTION COMPLETA";
        } else {
            $success = true;
            $message = "NO SE LOGRO ACTUALIZAR";
        }

        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gestiones  $gestiones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gestiones $gestiones)
    {
        //
    }
}
