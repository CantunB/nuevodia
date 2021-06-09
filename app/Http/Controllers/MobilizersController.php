<?php

namespace App\Http\Controllers;
use App\Models\District;
use App\User;
use App\Models\Leader;
use App\Models\Mobilizer;
use App\Models\Sympathizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Libedit;
use Yajra\DataTables\DataTables;
use function GuzzleHttp\Promise\all;

class MobilizersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_movilizadores')->only(['create','store']);
        $this->middleware('role_or_permission:read_movilizadores')->only(['index','show']);
        $this->middleware('role_or_permission:update_movilizadores')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_movilizadores')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $distritos = District::all();
        //$lideres = Leader::all();
       if (Auth::user()->hasRole(['Super Admin','administrador'])){
            $lideres = Leader::with('getInfo')->get();
        }else{
             $lideres = Leader::with('getInfo')->where('user_id',Auth::user()->id)->get();
        }
        if ($request->ajax()){
            if (Auth::user()->hasRole(['Super Admin','administrador'])){
                $movilizadores = Mobilizer::with('getInfo','getInfoLider');
            }else{
                $movilizadores = Mobilizer::where('user_id',Auth::user()->id);
            }
            return DataTables::of($movilizadores)
                ->addColumn('lider', function ($movilizadores){
                    return $movilizadores->getInfoLider->nombre .' '. $movilizadores->getInfoLider->paterno .' '. $movilizadores->getInfoLider->materno;
                })->filterColumn('lider', function($query, $keyword) {
                    $sql = "CONCAT(sympathizers.nombre,sympathizers.paterno,sympathizers.materno)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->addColumn('movilizador', function ($movilizadores){
                    return $movilizadores->getInfo->nombre .' '.$movilizadores->getInfo->paterno .' '. $movilizadores->getInfo->materno;
                })->filterColumn('movilizador', function($query, $keyword) {
                $sql = "CONCAT(sympathizers.nombre,sympathizers.paterno,sympathizers.materno)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->addColumn('distrito', function ($movilizadores){
                    return $movilizadores->getInfo->distrito;
                })
                ->addColumn('seccion', function ($movilizadores){
                    return $movilizadores->getInfo->seccion;
                })
                ->addColumn('celular', function ($movilizadores){
                    return $movilizadores->getInfo->celular;
                })
                ->addColumn('tocados', function ($movilizadores){
                    return  Mobilizer::getTocados($movilizadores->mobilizer_id)->count();
                })
                ->addColumn('capturado', function ($movilizadores){
                    return $movilizadores->getInfo->created_at->toFormattedDateString();
                })
                ->addColumn('opciones', function ($movilizadores){
                    $opciones = '';
                    if (Auth::user()->can('read_tocados')){
                        $opciones .= '<a href=" '.route('Sympathizers.show', $movilizadores->mobilizer_id).' " class="action-icon icon-dual-success"><i class="mdi mdi-account-group"></i></a>';
                    }
                    if (Auth::user()->can('update_movilizadores')){
                        $opciones  .= '<a href=" '. route('Mobilizers.edit',$movilizadores->mobilizer_id) .' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                    }
                    return $opciones;
                })
            ->rawColumns(['opciones'])
            ->make(true);
        }

        return view('mobilizers.index',compact('distritos','lideres'));
    }

    public function search(Request $request)
    {
        if (Auth::user()->hasRole(['Super Admin','administrador'])){
            $lideres = Leader::with('getInfo')->get();
        }else{
            $lideres = Leader::with('getInfo')->where('user_id',Auth::user()->id)->get();
        }

        if(($request->fecha1) and ($request->fecha2) and ($request->lider))
        {
            $distritos = District::all();
            $liderselect =  $request->lider;
            $fecha1 =  $request->fecha1;
            $fecha2 =  $request->fecha2;
            $movilizadores = Mobilizer::where('leader_id',$liderselect)
                //->where('user_id', Auth::user()->id)
                ->whereDate('created_at','>=',$fecha1)
                ->whereDate('created_at','<=',$fecha2)->get();
            //$lider = Mobilizer::find(1);
            //return $lider->lideres;
            //  return view('mobilizers.list_mobilizer',compact('distritos','lideres','movilizadores', 'fecha1', 'fecha2', 'liderselect' ));
            return view('mobilizers.search',compact('distritos','lideres','movilizadores', 'fecha1', 'fecha2', 'liderselect' ));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distritos = District::all();
        if (Auth::user()->hasRole(['Super Admin','administrador'])) {
            $lideres = Leader::all();
        }else{
            $lideres = Leader::where('user_id', Auth::user()->id);
        }
        //return $lideres->simpatizantes;
        return view('mobilizer',compact('distritos','lideres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'clave_elector' => 'required|unique:sympathizers,clave_elector'
        ];
        $messages = [
            'clave_elector.required' => 'Necesitamos la :attribute para el registro',
            'clave_elector.unique' => 'La :attribute ya fue capturada!',
        ];
        $attributes = [
            'clave_elector' => 'clave de elector',
        ];
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if ($validator->fails())
        {
            return redirect()->route('Mobilizers.index')
                ->withErrors($validator)
                ->withInput()
                ->with('status_error','FALLO EL REGISTRO LA CLAVE DE ELECTOR YA ESTA REGISTRADA');
        }

        $simpatizante = Sympathizer::create($request->all());
        $simpatizante->movilizador()->attach(
            $simpatizante->id,
            [
              //  'mobilizer_id' => $simpatizante->id,
                'user_id' => Auth::user()->id,
                'leader_id'=> $request->lider,
                'created_at'=> $simpatizante->created_at,
                'updated_at'=> $simpatizante->updated_at,
            ]);
        return redirect()->route('Mobilizers.index')->with('status_success','REGISTRO CREADO CORRECTAMENTE');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobilizer  $mobilizer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->hasRole(['Super Admin','administrador'])) {
            $liderfind = Sympathizer::findOrFail($id);
            $lideres = Leader::with('getInfo')->get();
            $movilizadores = Mobilizer::with(['getInfo','getInfoLider'])->where('leader_id', $id)->get();;
            $distritos = District::all();
        }else {
            $liderfind = Sympathizer::findOrFail($id);
            $lideres = Leader::where('user_id', Auth::user()->id)->get();
            $movilizadores = Mobilizer::where('leader_id', $id)->get();
            $distritos = District::all();
        }

        return view('mobilizers.show',compact('distritos', 'liderfind','lideres','movilizadores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mobilizer  $mobilizer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distritos = District::all();
        if (Auth::user()->hasRole(['Super Admin','administrador'])) {
            $lideres = Leader::all();
        }else
        {
            $lideres = Leader::where('user_id',Auth::user()->id)->get();
        }
        $movilizador = Sympathizer::findorFail($id);
        $lider_id = Mobilizer::where('mobilizer_id',$movilizador->id)->first();
        $usuarios = User::all();
        //return $liderselect->lider;
        return view('mobilizers.edit',compact('distritos','lideres','movilizador','lider_id','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mobilizer  $mobilizer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'clave_elector' => 'required|unique:sympathizers,clave_elector,'.$id
        ];
        $messages = [
            'clave_elector.required' => 'Necesitamos la :attribute para el registro',
            'clave_elector.unique' => 'La :attribute ya fue capturada!',
        ];
        $attributes = [
            'clave_elector' => 'clave de elector',
        ];
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if ($validator->fails())
        {
            return redirect()->route('Leaders.index')
                ->withErrors($validator)
                ->withInput()
                ->with('status_error','FALLO LA ACTUALIZACION CLAVE DE ELECTOR YA CAPTURADA');
        }

    $simpatizante = Sympathizer::findOrFail($id);
        //return $request->all();
    $simpatizante->update($request->all());
       // $simpatizante = Sympathizer::find($id)->update($request->all());
       // $movilizador =  Mobilizer::where('mobilizer_id',$simpatizante->id)->first();
       // $movilizador->delete();
       // $simpatizante->movilizador()->delete();
       /***
        * RELACION DE LA TABLA MOVILIZADORES
        */
    // return $simpatizante;
        $simpatizante->getMovilizadores_check()->sync(
            [ $simpatizante->id =>[
                'leader_id'=> $request->lider_id,
                'user_id' => $request->user_id,
                //'mobilizer_id' => $simpatizante->id,
                'created_at' => $simpatizante->created_at,
                'updated_at' => $simpatizante->updated_at,
                ]                    
            ]);


        return redirect()->route('Mobilizers.index')->with('status_info','MOVILIZADOR ACTUALIZADO CORRECTAMENTE');
       // return view('list_mobilizer',compact('distritos','lista','lideres'))->with('status_success','REGISTRO ACTUALIZADO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobilizer  $mobilizer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Mobilizer::findOrFail($id)->delete();
        if ($delete == 1){
            $success = true;
            $message = "Movilizador eliminado correctamente";
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
