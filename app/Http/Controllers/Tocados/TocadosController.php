<?php

namespace App\Http\Controllers\Tocados;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Distritacion;
use App\Models\Mobilizer;
use App\Models\Sympathizer;
use App\Models\Tocados;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
//use Yajra\DataTables\Services\DataTables;

class TocadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
<<<<<<< HEAD
=======
        $this->middleware('role_or_permission:create_tocados')->only(['create','store']);
        $this->middleware('role_or_permission:read_tocados')->only(['index','show']);
        $this->middleware('role_or_permission:update_tocados')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_tocados')->only(['destroy']);
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $distritos = District::all();
        $secciones = Distritacion::all();
        $usuarios = User::where('estatus','1')->get();

        if (Auth::user()->hasRole(['Super Admin','administrador'])) {
            $movilizadores = Mobilizer::with(['getInfo'])->get();
        }else{
            $movilizadores = Mobilizer::where('user_id',Auth::user()->id)->get();
        }
        $distritos = District::all();

        if ($request->ajax()){
            if (Auth::user()->hasRole(['Super Admin','administrador']))
            {
                $tocados = Tocados::with(['getInfo','movilizadores','getUser']);
              // $tocados = Sympathizer->getTocados_check();
            }else{
                $tocados = Tocados::with(['getInfo','movilizadores','getUser'])->where('user_id',Auth::user()->id);
            }
            return DataTables::of($tocados)
                ->addIndexColumn()
                ->addColumn('movilizador', function ($tocados){
                    return $tocados->movilizadores->nombre.' '.$tocados->movilizadores->paterno .' '.$tocados->movilizadores->materno;
                })
                ->addColumn('nombre', function ($tocados){
                    return $tocados->getInfo->nombre.' '.$tocados->getInfo->paterno .' '. $tocados->getInfo->materno;
                })
                ->filterColumn('nombre', function($query, $keyword) {
                        $query->whereHas('getInfo', function($query) use ($keyword) {
                         //   $query->whereRaw("CONCAT(nombre, paterno, materno) like ?", ["%{$keyword}%"]);
                            $query->whereRaw("CONCAT(COALESCE(`nombre`,''), COALESCE(`paterno`,''), COALESCE(`materno`,'')) like ?", ["%{$keyword}%"]);
                        });
                    })
                ->addColumn('clave_elector', function ( $tocados){
                        return $tocados->getInfo->clave_elector;
                    })
                ->addColumn('direccion', function($tocados){
                        return  'Calle ' . $tocados->getInfo->calle .' '
                        .$tocados->getInfo->cruzamiento
                        .' No.Ext '
                        .$tocados->getInfo->o_ext
                        .' No.Int '
                        .$tocados->getInfo->no_int
                        .' Colonia '
                        .$tocados->getInfo->colonia
                        .' C.P. ' .$tocados->getInfo->cp;
                    })
                ->addColumn('distrito', function ($tocados){
                    return $tocados->getInfo->distrito;
                })
                ->addColumn('seccion', function ($tocados){
                    return $tocados->getInfo->seccion;
                })
                ->addColumn('celular', function ($tocados){
                    return $tocados->getInfo->celular;
                })
                ->addColumn('gestion', function ($tocados){
                    return $tocados->getInfo->gestion;
                })
                ->addColumn('estatus_gestion', function ($tocados){
                    if($tocados->getInfo->estatus_gestion === null){
                        return  ' <span class="badge badge-secondary">POR GESTIONAR</span>';
                    }elseif($tocados->getInfo->estatus_gestion === "COMPLETA"){
                        return  ' <span class="badge badge-success">Completa</span>';
                    }else{
                        return  ' <span class="badge badge-secondary">SIN GESTION</span>';
                    }
                })
                ->editColumn('capturista', function ( $tocados){
                    return $tocados->getUser->nombre;
                        })->filterColumn('capturista', function($query, $keyword) {
                        $sql = "users.nombre  like ?";
                        $query->whereRaw($sql, ["%{$keyword}%"]);
                    })
                ->addColumn('capturado', function (Tocados $tocados){
                    return $tocados->getInfo->created_at->toFormattedDateString();
                })
                ->addColumn('opciones', function (Tocados $tocados){
                    $opciones = '';
                    if (Auth::user()->can('read_tocados')){
                        $opciones .= '<button type="button" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-circle"></i></button>';
                    }
                    if (Auth::user()->can('update_tocados')){
                        //$opciones .= '<a href=" '.route('Sympathizers.edit', $tocados->tocado_id).' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                        $opciones .= '<button type="button" class="btn btn-sm action-icon btnModalEdit icon-dual-warning"><i class="mdi mdi-account-cog"></i></button>';
                    }
                    return $opciones;
                })
                ->rawColumns(['opciones','estatus_gestion'])
                ->toJson();
        }
        return view('tocados.index',compact('distritos','secciones','movilizadores','usuarios'));
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
        Tocados::create($request->all());
        return redirect()->back()->with('status_success','Nuevo Tocado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



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
      //  return $request->all();
        $simpatizante = Sympathizer::findOrFail($id);
        $simpatizante->update($request->all());
        $simpatizante->getTocados_check()->sync(
            [ $simpatizante->id =>[
                //'leader_id'=> $request->lider_id,
                'user_id' => $request->user_id,
                'mobilizer_id' => $request->mobilizer_id,
                'created_at' => $simpatizante->created_at,
                'updated_at' => $simpatizante->updated_at,
                ]
            ]);
        if ($simpatizante == true){
            $success = true;
            $message = "Registro actualizado correctamente";
        } else {
            $success = true;
            $message = "Registro no actualizado";
        }

        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Tocados::findOrFail($id)->delete();
        //return $delete;
        //return back();
        if ($delete == 1){
            $success = true;
            $message = "Tocado eliminado correctamente";
        } else {
            $success = true;
            $message = "Fallo el proceso";
        }

        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }
}
