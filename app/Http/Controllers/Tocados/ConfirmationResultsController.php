<?php

namespace App\Http\Controllers\Tocados;

use App\Http\Controllers\Controller;
use App\Models\ConfirmationResult;
use App\Models\Leader;
use App\Models\Mobilizer;
use App\Models\Tocados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use Yajra\DataTables\DataTables;

class ConfirmationResultsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_confirmacion')->only(['create','store']);
        $this->middleware('role_or_permission:read_confirmacion')->only(['index','show']);
        $this->middleware('role_or_permission:update_confirmacion')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_confirmacion')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $movilizadores = ConfirmationResult::with(['getInfo'])->select('mobilizer_id')->groupBy('mobilizer_id')->get();
            return  DataTables::of($movilizadores)
                ->addIndexColumn()
                ->addColumn('movilizador', function($movilizadores){
                    return $movilizadores->getInfo->nombre .' '. $movilizadores->getInfo->paterno .' '. $movilizadores->getInfo->materno;
                })
                ->addColumn('buttons', function ($movilizadores){
                  return  $opciones  = '<button type="button" class="btn btn-sm action-icon grafica icon-dual-blue"><i class="mdi mdi-chart-bar-stacked"></i></button>
                  ';
                })
                ->rawColumns(['buttons'])
                ->toJson();
        }

        return view('tocados.confirmacion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       if ($request->ajax()){
        if ( true === ( $request->lider ?? null ) ) {
            $movilizadores = Mobilizer::with(['getInfo'])->where('leader_id', $request->lider);
        }else{
            $movilizadores = Mobilizer::with(['getInfo'])->where('leader_id', $request->lider);
        }
        return  DataTables::of($movilizadores)
            ->addIndexColumn()
            ->addColumn('nombre', function ($movilizadores){
                return $movilizadores->getInfo->nombre .' '. $movilizadores->getInfo->paterno .' '. $movilizadores->getInfo->materno;
            })
            ->filterColumn('nombre', function($query, $keyword) {
                $query->whereHas('getInfo', function($query) use ($keyword) {
                    //$query->whereRaw("CONCAT(nombre, paterno, materno) like ?", ["%{$keyword}%"]);
                    $query->whereRaw("CONCAT(COALESCE(`nombre`,''), COALESCE(`paterno`,''), COALESCE(`materno`,'')) like ?", ["%{$keyword}%"]);
                });
            })
            ->addColumn('tocados', function (Mobilizer $movilizadores){
               //return $contador =
               if (Auth::user()->can('read_tocados')){
                return  Mobilizer::getTocados($movilizadores->mobilizer_id)->count() . '<button type="button" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-circle"></i></button>';
            }
            })
            ->rawColumns(['tocados'])
            ->toJson();

      //  $movilizadores = ConfirmationResult::all();

    }

    $lideres = Leader::with(['getInfo'])->get();

        return view('tocados.confirmacion.create', compact('lideres'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTocados(Request $request)
    {
        //return $request->mobilizer_id;
        if ($request->ajax()){
            if ( true === ( $request->mobilizer_id ?? null ) ) {
                $tocados = Tocados::with(['getInfo','movilizadores','getPollsConfirmation'])->where('mobilizer_id', $request->mobilizer_id);
            }else{
                $tocados = Tocados::with(['getInfo','movilizadores','getPollsConfirmation'])->where('mobilizer_id', $request->mobilizer_id);
            }
            //$tocados = ConfirmationResult::all();
            return  DataTables::of($tocados)
                ->addIndexColumn()
                ->addColumn('movilizador', function ($tocados){
                    return $tocados->movilizadores->nombre.' '.$tocados->movilizadores->paterno .' '.$tocados->movilizadores->materno;
                })
                ->addColumn('tocados', function ($tocados){
                    return $tocados->getInfo->nombre.' '.$tocados->getInfo->paterno .' '. $tocados->getInfo->materno;
                })
                ->addColumn('encuesta', function ($tocados){
                    $encuesta = '';
                    if ($tocados->getPollsConfirmation()->pluck('tocado_id')->contains($tocados->tocado_id)) {
                    $encuesta .=    '<label>
                                        <input type="hidden" name="tocado_id[]" value=" '.$tocados->tocado_id .' ">
                                        <input type="hidden" name="mobilizer_id" value=" '. $tocados->mobilizer_id .' ">
                                        ';
                        if ($tocados->getPollsConfirmation()->pluck('confirmation_status')->contains('1')) {
                            $encuesta .= '<input class="radio radio-info" type="checkbox" checked value="1" name="confirmation_status[]">SI';
                        }else{
                            $encuesta .= '<input class="radio radio-info" type="checkbox"  value="1" name="confirmation_status[]">SI';
                        }
                        if ($tocados->getPollsConfirmation()->pluck('confirmation_status')->contains('2')) {
                            $encuesta .= '<input class="radio radio-info" type="checkbox" checked value="2" name="confirmation_status[]"> NO';
                        }else{
                            $encuesta .= '<input class="radio radio-info" type="checkbox" value="2" name="confirmation_status[]"> NO';
                        }
                        if ($tocados->getPollsConfirmation()->pluck('confirmation_status')->contains('3')) {
                            $encuesta .= '<input class="radio radio-info" type="checkbox" checked value="3" name="confirmation_status[]"> NO ES SEGURO
                                         </label>';
                        }else{
                            $encuesta .= '<input class="radio radio-info" type="checkbox" value="3" name="confirmation_status[]"> NO ES SEGURO
                                            </label>';
                        }
                    }else{
                        $encuesta .= '<label>
                                        <input type="hidden" name="tocado_id[]" value=" '.$tocados->tocado_id .' ">
                                        <input type="hidden" name="mobilizer_id" value=" '. $tocados->mobilizer_id .' ">
                                        <input class="radio radio-info" type="checkbox"  value="1" name="confirmation_status[]">SI
                                        <input class="radio radio-info" type="checkbox" value="2" name="confirmation_status[]"> NO
                                        <input class="radio radio-info" type="checkbox" value="3" name="confirmation_status[]"> NO ES SEGURO
                                    </label>';
                    }

                    return $encuesta;
                })
                ->rawColumns(['encuesta'])
                ->toJson();
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request->all();
      //  ConfirmationResult::create($request->all());
        foreach ($request->confirmation_status as $item => $c) {
            $encuesta = ConfirmationResult::where('tocado_id', $request->tocado_id[$item])->first();
           // $tocado = Tocados::where('tocado_id',$request->tocado_id[$item])->first();
            $data2 = array(
                'mobilizer_id' => $request->mobilizer_id,
                'tocado_id' => $request->tocado_id[$item],
                'confirmation_status' => $request->confirmation_status[$item],
                'created_at' => now(),
            );
            if ($encuesta !== null) {
                $encuesta->update($data2);
            } else {
               $encuesta = ConfirmationResult::insert($data2);
            }
        }
        return redirect()->back()->with('status_success','Nuevo Registro');
    }

    public function getConfirmacion(Request $request)
    {
        $id = $request->id;
        $si = ConfirmationResult::where('mobilizer_id',$id)->Confirmed()->count();
        $no = ConfirmationResult::where('mobilizer_id',$id)->where('confirmation_status','2')->count();
        $no_s = ConfirmationResult::where('mobilizer_id',$id)->where('confirmation_status','3')->count();
        return response()->json([
            'si' => $si,
            'no' => $no,
            'no_s' => $no_s,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
