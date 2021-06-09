<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\Leader;
use App\Models\Mobilizer;
use App\Models\Sympathizer;
use App\Models\Tocados;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class AdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_administrador')->only(['create','store']);
        $this->middleware('role_or_permission:read_administrador')->only(['index','show']);
        $this->middleware('role_or_permission:update_administrador')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_administrador')->only(['destroy']);
    }

    public function index()
    {
        $roles = Role::all();
        return view('administrador.index',compact('roles'));
    }

    public function sympathizers(Request $request)
    {
          $sympathizers = Sympathizer::with(['getMovilizadores_check','getTocados_check','TocadoPivot'])->whereIn('user_id', [3,4])->whereIn('clave_elector', function($query){
            $query->select('clave_elector')
            ->from(with(new Encuesta())->getTable())
            ->where('q5','!=','opcion1')
            ->where('q5','!=','opcion7')
            ->where('q5','!=','opcion8');
        })->get() ;
    //    / return $lideres = collect([    'user_id' => Leader::all()->groupBy('user_id')]);
        $usuarios = User::where('estatus','1')->get();
        $simpatizantes = Sympathizer::cursor();
        $movilizadores = Mobilizer::with(['getInfoLider','getInfo','getUser'])->get();

        if ($request->ajax()){
           // $sympathizers = Sympathizer::with(['getUser']);
            $sympathizers = Sympathizer::with(['getUser'])->whereIn('clave_elector', function($query){
                $query->select('clave_elector')
                ->from(with(new Encuesta())->getTable())
                ->where('q5','!=','opcion1')
                ->where('q5','!=','opcion7')
                ->where('q5','!=','opcion8');
            });
           // SELECT * FROM sympathizers WHERE and clave_elector IN(SELECT clave_elector FROM encuestas where q5 != 'opcion1' and q5 != 'opcion7' and q5 != 'opcion8')
            return DataTables::of($sympathizers)
                ->addColumn('actions', function($sympathizers){
                    return '<button onclick="deleteConfirmationSympathizers('.$sympathizers->id.')"
                    data-id=" '.$sympathizers->id.' "
                    class="btn action-icon icon-dual-danger">
                    <i class="mdi mdi-trash-can"></i>
                    </button>'.
                    '<button
                    class="btn getInfo action-icon icon-dual-blue">
                    <i class="mdi mdi-account-arrow-right"></i>
                    </button>';
                })
                ->editColumn('nombre', function ($sympathizers){
                    return $sympathizers->nombre .' '.  $sympathizers->paterno .' '. $sympathizers->materno;
                })
                ->filterColumn('nombre', function($query, $keyword) {
                    $query->whereRaw("CONCAT(COALESCE(`nombre`,''), COALESCE(`paterno`,''), COALESCE(`materno`,'')) like ?", ["%{$keyword}%"]);
                })
                ->editColumn('fe_nacimiento', function ($sympathizers){
                   // return $sympathizers->fe_nacimiento->diffInYears();
                   $birthday = $sympathizers->fe_nacimiento;
                   return  $birthday .' '.'( '.Carbon::parse($sympathizers->fe_nacimiento)->diff(Carbon::now())->format('%y años') .' )';
                   // return $sympathizers->fe_nacimiento
                 })
                ->addColumn('direccion', function($sympathizers){
                    return  'Calle ' . $sympathizers->calle .' '
                    .$sympathizers->cruzamiento
                    .' No.Ext '
                    .$sympathizers->no_ext
                    .' No.Int '
                    .$sympathizers->no_int
                    .' Colonia '
                    .$sympathizers->colonia
                    .' C.P. ' .$sympathizers->cp;
                })
                ->editColumn('user_id', function (Sympathizer $sympathizers){
                    return $sympathizers->getUser->nombre;
                    })->filterColumn('user_id', function($query, $keyword) {
                        $sql = "users.nombre  like ?";
                        $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->editColumn('created_at', function ($sympathizers){
                  //  return $sympathizers->created_at->toDateTimeString('Y m d');
                    return $sympathizers->created_at->format('Y-m-d');

                })
                ->addColumn('isLider', function ($sympathizers){
                    if ($sympathizers->getLideres_check->pluck('id')->contains($sympathizers->id)){
                        return ' <button onclick="btonLider('.$sympathizers->id.')" data-toggle="modal" data-target="#modalInfoLider" class="btn btn-sm btn-xs btn-info"><i class="mdi mdi-check"></i> LIDER</button>';
                    }
                })
                ->addColumn('isMovilizador', function ($sympathizers){
                    if ($sympathizers->getMovilizadores_check->pluck('id')->contains($sympathizers->id)){
                        return '<button onclick="btonMovilizador('.$sympathizers->id.')" data-toggle="modal" data-target="#modalInfoMovilizador" class="btn btn-sm btn-xs btn-info"><i class="mdi mdi-check"></i> MOVILIZADOR</button>';
                    }
                })
                ->addColumn('isTocado', function ($sympathizers){
                    if ($sympathizers->getTocados_check->pluck('id')->contains($sympathizers->id)){
                        return '<button onclick="btonTocado('.$sympathizers->id.')" data-toggle="modal" data-target="#modalInfoTocado" class="btn btn-sm btn-xs btn-info"><i class="mdi mdi-check"></i> TOCADO</button>';
                    }

                })
                ->rawColumns(['actions','direccion','isLider','isMovilizador','isTocado'])
                ->make(true);
        }
        return view('administrador.sympathizers.index',compact('usuarios','simpatizantes','movilizadores', 'sympathizers'));
    }

    public function getInfoLider(Request $request)
    {
        //return 'estoy en mi controlador listo para traer la informacion del lider';
       // $lider = Leader::with(['getInfo','getUser'])->findOrFail($request->id);
       $lider = Leader::with(['getInfo','getUser'])->where('leader_id',$request->id)->first();
        $nombre = $lider->getInfo->nombre .' '.  $lider->getInfo->paterno .' '.  $lider->getInfo->materno;
        $movilizadores = Leader::getMovilizadores($request->id)->count();
        $btndelete = '<button onclick="deleteConfirmationLider('.$lider->id.')"
        data-id=" '.$lider->id.' "
        type="button"
        class="btn btn-outline-danger">Eliminar</button>';
        return response()->json([
            'lider_nombre' => $nombre,
            'lider_user' => $lider->getUser->nombre,
            'lider_create' => $lider->getInfo->created_at->format('Y-m-d H:i'),
            'lider_movilizadores' => $movilizadores,
            'lider_btndelete' => $btndelete
        ], 200);
    }
    public function getInfoMovilizador(Request $request)
    {
        //return 'estoy en mi controlador listo para traer la informacion del Movilizador';
       // $movilizador = Mobilizer::with(['getInfo','getUser','getInfoLider'])->findOrFail($request->id);
       $movilizador = Mobilizer::with(['getInfo','getUser','getInfoLider'])->where('mobilizer_id',$request->id)->first();
        $nombre = $movilizador->getInfo->nombre .' '.  $movilizador->getInfo->paterno .' '.  $movilizador->getInfo->materno;
        $nombre_lider = $movilizador->getInfoLider->nombre .' '. $movilizador->getInfoLider->paterno .' '. $movilizador->getInfoLider->materno;
        $tocados = Mobilizer::getTocados($request->id)->count();
        $btndelete_mov = '<button onclick="deleteConfirmationMovilizador('.$movilizador->id.')"
                                                data-id=" '.$movilizador->id.' "
                                                type="button"
                                                class="btn btn-outline-danger">Eliminar</button>';
        return response()->json([
            'movilizador_nombre' => $nombre,
            'movilizador_lider' => $nombre_lider,
            'movilizador_user' => $movilizador->getUser->nombre,
            'movilizador_create' => $movilizador->getInfo->created_at->format('Y-m-d H:i'),
            'movilizador_tocados' => $tocados,
            'movilizador_btndelete' => $btndelete_mov
        ], 200);
    }
    public function getInfoTocado(Request $request)
    {
       // return 'estoy en mi controlador listo para traer la informacion del TOCADO';
        $tocado = Tocados::with(['getInfo','getUser','movilizadores'])->where('tocado_id',$request->id)->first();
        $nombre = $tocado->getInfo->nombre .' '.  $tocado->getInfo->paterno .' '.  $tocado->getInfo->materno;
        $nombre_movilizador = $tocado->movilizadores->nombre .' '.$tocado->movilizadores->paterno .' '. $tocado->movilizadores->materno;
        $lider = Mobilizer::with(['getInfoLider'])->where('mobilizer_id',$tocado->movilizadores->id)->first();
        $nombre_lider = $lider->getInfoLider->nombre .' '. $lider->getInfoLider->paterno .' '. $lider->getInfoLider->materno;
        if ($tocado->getInfo->estatus_gestion === null) {
            $tocado_gestion = '<span class="badge badge-secondary">Gestion en espera</span>';
        }elseif($tocado->getInfo->estatus_gestion === "COMPLETA"){
            $tocado_gestion = '<span class="badge badge-success">Completa</span>';
        }else{
            $tocado_gestion = '<span class="badge badge-secondary">Sin Gestion</span>';
        }
        $btndelete_toc = '<button onclick="deleteConfirmationTocado('.$tocado->id.')"
                                                data-id=" '.$tocado->id.' "
                                                type="button"
                                                class="btn btn-outline-danger">Eliminar</button>';
        return response()->json([
            'tocado_nombre' => $nombre,
            'tocado_lider' => $nombre_lider,
            'tocado_movilizador' => $nombre_movilizador,
            'tocado_user' => $tocado->getUser->nombre,
            'tocado_create' => $tocado->getInfo->created_at->format('Y-m-d H:i'),
            'tocado_gestion' => $tocado->getInfo->gestion,
            'tocado_gestion_estatus' => $tocado_gestion,
            'tocado_btndelete' => $btndelete_toc
        ], 200);
    }
    /**  Vista para los simpatizantes con clave de elector
     *  Configuracion para los accesos a lider y/o movilizador
     **/
    public function test(Request $request)
    {
        $usuarios = User::where('estatus','1')->get();
        $simpatizantes = Sympathizer::cursor();
        $movilizadores = Mobilizer::with(['getInfoLider','getInfo','getUser'])->get();
        if ($request->ajax()){
            $sympathizers = Sympathizer::with(['getUser','getTocados_check']);
            return DataTables::of($sympathizers)
                ->editColumn('nombre', function ($sympathizers){
                    return '<button onclick="deleteConfirmationSympathizers('.$sympathizers->id.')"
                                data-id=" '.$sympathizers->id.' "
                                class="btn action-icon icon-dual-danger">
                                <i class="mdi mdi-trash-can"></i>
                                </button>'
                        .$sympathizers->nombre .' '.  $sympathizers->paterno .' '. $sympathizers->materno;
                    })->filterColumn('nombre', function($query, $keyword) {
                        $query->whereRaw('CONCAT(nombre, paterno, materno) like ?', ["%{$keyword}%"]);
                })
                ->editColumn('user_id', function (Sympathizer $sympathizers){
                    return $sympathizers->getUser->nombre;
                    })->filterColumn('user_id', function($query, $keyword) {
                        $sql = "users.nombre  like ?";
                        $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->editColumn('created_at', function ($sympathizers){
                    return $sympathizers->created_at->toDateTimeString();
                })
                ->addColumn('isLider', function ($sympathizers){
                    if ($sympathizers->getLideres_check->pluck('id')->contains($sympathizers->id)){
                        return '<div class="checkbox checkbox-info checkbox-circle mb-1">
                                    <input checked disabled id="checkbox6a" type="checkbox">
                                    <label for="checkbox6a">
                                    </label>
                                </div>';
                    }else
                    {
                        return '<div class="checkbox checkbox-info checkbox-circle mb-2">
                                    <input disabled id="checkbox6a" type="checkbox">
                                    <label for="checkbox6a">
                                    </label>
                                </div>';
                    }
                })
                ->addColumn('isMovilizador', function ($sympathizers){
                    if ($sympathizers->getMovilizadores_check->pluck('id')->contains($sympathizers->id)){
                        return '<div class="checkbox checkbox-info checkbox-circle mb-2">
                                    <input checked disabled id="checkbox6a" type="checkbox">
                                    <label for="checkbox6a">
                                    </label>
                                </div>';
                    }else
                    {
                        return'<div class="checkbox checkbox-info checkbox-circle mb-2">
                                    <input disabled id="checkbox6a" type="checkbox">
                                    <label for="checkbox6a">
                                    </label>
                                </div>';
                    }
                })
                ->addColumn('isTocado', function ($sympathizers){
                    if ($sympathizers->getTocados_check->pluck('id')->contains($sympathizers->id)){
                        return '<div class="checkbox checkbox-info checkbox-circle mb-2">
                                    <input checked disabled  id="checkbox6a" type="checkbox">
                                    <label for="checkbox6a">
                                    </label>
                                </div>';
                    }else
                    {
                        return '<div class="checkbox checkbox-info checkbox-circle mb-2">
                                    <input disabled id="checkbox6a" type="checkbox">
                                    <label for="checkbox6a">
                                    </label>
                                </div>';
                    }

                })
                ->addColumn('isLiderAction', function ($sympathizers){
                    if ($sympathizers->getLideres_check->pluck('id')->contains($sympathizers->id)){
                        $isLiderAction = '';
                        if (Auth::user()->can('read_lideres')){
                            $isLiderAction .= '<a href=" '.route('Leaders.show', $sympathizers->LiderPivot->id) .' " target="_blank" class="action-icon icon-dual-blue"><i class="mdi mdi-account-circle"></i></a>';
                        }
                        if (Auth::user()->can('edit_lideres')){
                            $isLiderAction .= '<a href="" class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                        }
                        if (Auth::user()->can('delete_lideres')) {
                            $isLiderAction .= '<button onclick="deleteConfirmationLider('.$sympathizers->LiderPivot->id.')"
                                                data-id=" '.$sympathizers->LiderPivot->id.' "
                                                class="btn action-icon icon-dual-danger"><i class="mdi mdi-account-minus"></i></button>';
                        }
                        return $isLiderAction;
                    }
                })

                ->addColumn('isMovilizadorAction', function ($sympathizers){
                    if ($sympathizers->getMovilizadores_check->pluck('id')->contains($sympathizers->id)) {
                        $isMovilizadorAction = '';
                        if (Auth::user()->can('read_movilizadores')){
                            $isMovilizadorAction .= '<a href=" " class="action-icon icon-dual-blue"><i class="mdi mdi-account-circle"></i></a>';
                        }
                        if (Auth::user()->can('edit_movilizadores')){
                            $isMovilizadorAction .= '<a href="" class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                        }
                        if (Auth::user()->can('delete_movilizadores')) {
                            $isMovilizadorAction .= '<button onclick="deleteConfirmationMovilizador('.$sympathizers->MovilizadorPivot->id.')"
                                                data-id=" '.$sympathizers->MovilizadorPivot->id.' "
                                                class="btn action-icon icon-dual-danger">
                                                <i class="mdi mdi-account-minus"></i></button>';
                        }
                        return $isMovilizadorAction;
                    }
                })
                ->addColumn('isTocadoAction', function ($sympathizers){
                    if ($sympathizers->getTocados_check->pluck('id')->contains($sympathizers->id)) {
                        $isTocadoActtion = '';
                        if (Auth::user()->can('read_tocados')){
                            $isTocadoActtion .= '<a href="" class="action-icon icon-dual-blue"><i class="mdi mdi-account-circle"></i></a>';
                        }
                        if (Auth::user()->can('edit_tocados')){
                            $isTocadoActtion .= '<a href="" class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                        }
                        if (Auth::user()->can('delete_tocados')) {
                            $isTocadoActtion .= '<button  onclick="deleteConfirmationTocado('.$sympathizers->TocadoPivot->id.')"
                                                data-id=" '.$sympathizers->TocadoPivot->id.' "
                                                data-action=" '.route('Tocados.destroy',$sympathizers->TocadoPivot->id) .' "
                                                class="btn action-icon icon-dual-danger">
                                                <i class="mdi mdi-account-minus"></i></button>';
                        }
                        return $isTocadoActtion;
                    }
                })
                ->rawColumns(['nombre','isLider', 'isMovilizador','isTocado','isLiderAction', 'isMovilizadorAction','isTocadoAction'])
                ->make(true);
        }
        return view('administrador.sympathizers.sympathizers',compact('usuarios','simpatizantes','movilizadores'));
        /*$sympathizers = Sympathizer::with(['getLideres_check','getMovilizadores_check','getTocados_check'])->get();
        return view('administrador.sympathizers.sympathizers',compact('sympathizers')); */
    }
    public function lideres(){
        $usuarios = User::all();
        $simpatizantes = Sympathizer::all();
        $lideres = Leader::all();
        return view('administrador.leaders.index',compact('lideres','usuarios','simpatizantes'));
    }
    public function movilizadores(){
        $usuarios = User::where('estatus','1')->get();
        $simpatizantes = Sympathizer::all();
        $movilizadores = Mobilizer::with(['getInfoLider','getInfo','getUser'])->get();
        return view('administrador.movilizadores.index',compact('movilizadores','usuarios','simpatizantes'));
    }
    /** @var $usuarios */
    /** @var $simpatizantes */
    /** @var $tocados */
    public function tocados(Request $request){
        $usuarios = User::where('estatus','1')->get();
        $simpatizantes = Sympathizer::cursor();
        if ($request->ajax()){
           $tocados = Tocados::with(['movilizadores','getInfo','getUser']);
           return DataTables::of($tocados)
            ->editColumn('id', function ($tocados){
                return $tocados->getInfo->id;
            })
           ->addColumn('movilizador', function (Tocados $tocados){
               return $tocados->movilizadores->nombre .' '. $tocados->movilizadores->paterno .' '. $tocados->movilizadores->materno;
               })->filterColumn('movilizador', function(Tocados $tocados, $keyword) {
                       $sql = "CONCAT(sympathizers.nombre,sympathizers.paterno,sympathizers.materno)  like ?";
                   $tocados->whereRaw($sql, ["%{$keyword}%"]);
           })
           ->addColumn('tocado', function (Tocados $tocados){
               return $tocados->getInfo->nombre .' '. $tocados->getInfo->paterno .' '. $tocados->getInfo->materno;
               })->filterColumn('tocado', function(Tocados $tocados, $keyword) {
                   $sql = "CONCAT(sympathizers.nombre,sympathizers.paterno,sympathizers.materno)  like ?";
                   $tocados->whereRaw($sql, ["%{$keyword}%"]);
           })
           ->editColumn('created_at', function ($tocados){
               //return $tocados->created_at->toFormattedDateString();
               return $tocados->created_at;
           })
           ->editColumn('user_id', function (Tocados $tocados){
                   return $tocados->getUser->nombre;
               })->filterColumn('user_id', function($query, $keyword) {
                   $sql = "users.nombre  like ?";
                   $query->whereRaw($sql, ["%{$keyword}%"]);
           })
           ->addColumn('action',function ($tocados){
            //   return '<a href="" class="action-icon icon-dual-danger"><i class="mdi mdi-trash-can"></i></a>';
               return '<button type="button" onclick="deleteConfirmation('. $tocados->id.')" class="btn action-icon icon-dual-danger"><i class="mdi mdi-trash-can"></i></button>';
           })
           ->startsWithSearch()
           ->make(true);
        }
    /** Vista administrador para los tocados  **/
    /**    $usuarios = User::where('estatus','1')->get();
        $simpatizantes = Sympathizer::cursor();
       $tocados = Tocados::with(['movilizadores','getInfo','getUser'])->get();
        return view('administrador.tocados.index',compact('tocados','usuarios','simpatizantes'));
       **/
    return view('administrador.tocados.index',compact('usuarios','simpatizantes'));
    }

    public function lideres_nuevo(Request $request){
        //return $request->all();
        Leader::create($request->all());
        return redirect()->back()->with('status_success','Nuevo Lider');
    }

    public function movilizadores_nuevo(Request $request)
    {
        //return $request->all();
        Mobilizer::create($request->all());
        return redirect()->back()->with('status_success', 'Nuevo Movilizador');
    }

}
