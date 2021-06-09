<?php

namespace App\Http\Controllers;
use App\Models\District;
use App\Models\Mobilizer;
use App\Models\Leader;
use App\Models\Sympathizer;
use App\Models\Distritacion;
use App\Models\Tocados;
use App\Models\OwnerTocado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class SympathizersController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_tocados')->only(['create','store']);
        $this->middleware('role_or_permission:read_tocados')->only(['index','show']);
        $this->middleware('role_or_permission:update_tocados')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_tocados')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasRole(['Super Admin','administrador','tocado']))
        {
            $movilizadores = Mobilizer::with(['getInfo'])->get();
        }else{
            $movilizadores = Mobilizer::where('user_id',Auth::user()->id)->get();
        }
        $secciones = Distritacion::all();
        $distritos = District::all();
        if ($request->ajax()){
            if (Auth::user()->hasRole(['Super Admin','administrador','tocado']))
            {
                $tocados = Tocados::with(['getInfo','movilizadores','getMovilizador']);
            }else{
                $tocados = Tocados::with(['getInfo','movilizadores','getMovilizador'])->where('user_id',Auth::user()->id);
            }
            return DataTables::of($tocados)
                ->addColumn('movilizador', function ($tocados){
                    return $tocados->movilizadores->nombre.' '.$tocados->movilizadores->paterno .' '.$tocados->movilizadores->materno;
                })->filterColumn('movilizador', function($query, $keyword) {
                    $sql = "CONCAT(sympathizers.nombre,sympathizers.paterno,sympathizers.materno)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                    })
                ->addColumn('tocados', function ($tocados){
                    return $tocados->getInfo->nombre.' '.$tocados->getInfo->paterno .' '. $tocados->getInfo->materno;
                })->filterColumn('tocados', function($query, $keyword) {
                    $sql = "CONCAT(sympathizers.nombre,sympathizers.paterno,sympathizers.materno)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
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
                    }else{
                        return  ' <span class="badge badge-success">Completa</span>';
                    }
                })
                ->addColumn('capturado', function (Tocados $tocados){
                    return $tocados->getInfo->created_at->toFormattedDateString();
                })
                ->addColumn('actions', function (Tocados $tocados){
                    $opciones = '';
                    if (Auth::user()->can('read_tocados')){
                        $opciones .= '<a href=" '.route('Sympathizers.edit', $tocados->tocado_id).' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                    }
                    return $opciones;
                })
                ->rawColumns(['actions','estatus_gestion'])
                ->make(true);
        }

        /** VISTA SIMPATIZANTES */

       /* if (Auth::user()->hasRole(['Super Admin','administrador','tocado']))
        {
            $movilizadores = Mobilizer::with(['getInfo'])->get();
            $tocados = Tocados::with(['getInfo','movilizadores'])->get();
        }else{
            $movilizadores = Mobilizer::where('user_id',Auth::user()->id)->get();
            $tocados = Tocados::where('user_id',Auth::user()->id)->get();
        }
        */
        /** FINAL */


        return view('tocados.list_tocado',compact('secciones','distritos','movilizadores'));
    }

    public function search(Request $request)
    { $secciones = Distritacion::all();
        $distritos = District::all();
        if (Auth::user()->hasRole(['Super Admin','administrador','tocado']))
            {
                $movilizadores = Mobilizer::with(['getInfo'])->get();
                $tocados = Tocados::with(['getInfo','movilizadores'])->get();
            }else{
                $movilizadores = Mobilizer::where('user_id',Auth::user()->id)->get();
                $tocados = Tocados::where('user_id',Auth::user()->id)->get();
            }

        if(($request->fecha1) and ($request->fecha2) and ($request->movilizador))
        {
            if (Auth::user()->hasRole(['Super Admin','administrador']))
            {
                $movilizadorselect =  $request->movilizador;
                $fecha1 =  $request->fecha1;
                $fecha2 =  $request->fecha2;
                $tocados = Tocados::where('mobilizer_id',$movilizadorselect)
                    ->whereDate('created_at','>=',$fecha1)
                    ->whereDate('created_at','<=',$fecha2)->get();
            }else{
                $movilizadorselect =  $request->movilizador;
                $fecha1 =  $request->fecha1;
                $fecha2 =  $request->fecha2;
                $tocados = Tocados::where('mobilizer_id',$movilizadorselect)
                    ->where('user_id',Auth::user()->id)
                    ->whereDate('created_at','>=',$fecha1)
                    ->whereDate('created_at','<=',$fecha2)->get();
            }
            //return view('tocados.list_tocado',compact('distritos','movilizadores', 'fecha1', 'fecha2', 'movilizadorselect','tocados' ));
            return view('tocados.search',compact('secciones','distritos','movilizadores', 'fecha1', 'fecha2', 'movilizadorselect','tocados' ));
        }
    }

    public function searcher()
    { $secciones = Distritacion::all();
        $distritos = District::all();
        if (Auth::user()->hasRole(['Super Admin','administrador'])) {
            $lideres = Leader::with('getInfo')->get();
            $movilizadores = Mobilizer::with(['getInfo'])->get();

        }else{
            $lideres = Leader::with('getInfo')->where('user_id',Auth::user()->id)->get();
            $movilizadores = Mobilizer::where('user_id',Auth::user()->id)->get();

        }
        return view('tocados.searcher',compact('secciones','distritos','lideres','movilizadores'));
    }
    public function searcher_data(Request $request){
        //return bcrypt('Dianduarte23');
        if($request->ajax()){
            $query = $request->get('query');
            if($query != ''){
                $data = Sympathizer::with('getUser')
                    ->orWhere(DB::raw("CONCAT(`nombre`, ' ', `paterno`, ' ', `materno`)"), 'LIKE', "%".$query."%")
                    ->orWhere('clave_elector', 'like', '%' .$query. '%')
                    ->orderBy('nombre', 'desc')
                    ->paginate(10);
            }
            $output = '';
            $total = $data->count();
            if($total > 0){
                foreach ($data as $key => $value) {
                    $output .= '<tr>
                            <td>'.$value->nombre.'</td>
                            <td>'.$value->paterno.'</td>
                            <td>'.$value->materno.'</td>
                            <td>'.$value->clave_elector.'</td>
                            <td><strong>'.$value->getUser->nombre.'</strong></td>
                            <td><span class="badge badge-danger">EXISTENTE</span></td>
                            <td>'.$value->created_at.'</td>
                        <tr>';
                }
            }else{
                $output = '<tr><td align="center" colspan="5">Ningun registro encontrado</td></tr>';
            }

            $data = array(
                'table_data' => $output,
                'total_data' => $total
            );
            echo json_encode($data);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user()->id;
        $distritos = District::all();
        $movilizadores = Mobilizer::where('user_id',$user)->get();
        //return $movilizadores->simpatizantes;

        return view('sympathizer',compact('distritos','movilizadores'));
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
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('status_error','FALLO EL REGISTRO DEL TOCADO LA CLAVE DE ELECTOR YA EXISTE!');
        }

        if(isset($request->propietario))
        {
            $simpatizante = Sympathizer::create($request->all());
            OwnerTocado::create([
                'owner_id' => $request['propietario'],
                'tocado_id' => $simpatizante->id,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->route('CallCenter.index')->with('status_success','TOCADO CREADO CORRECTAMENTE');
        }else{
            $simpatizante = Sympathizer::create($request->all());
            $simpatizante->tocado()->attach(
                $simpatizante->id,
                [
                    'user_id' => Auth::user()->id,
                    'mobilizer_id' => $request->movilizador,
                    'created_at' => $simpatizante->created_at,
                    'updated_at' => $simpatizante->updated_at,
                ]);

            return redirect()->route('Tocados.index')->with('status_success','REGISTRO CREADO CORRECTAMENTE');
        }


       // $simpatizante = Sympathizer::create($request->all());



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sympathizer  $sympathizer
     * @return \Illuminate\Http\Response
     */
    public function show(Sympathizer $sympathizer, $id)
    {
        if (Auth::user()->hasRole(['Super Admin','administrador']))
        {
            $movilizador = Sympathizer::findOrFail($id);
            $tocados = Tocados::with(['getInfo','movilizadores'])->where('mobilizer_id', $movilizador->id)->get();
            //$tocados = Tocados::all();
            $secciones = Distritacion::all();
            $distritos = District::all();
            $movilizadores = Mobilizer::with('getInfo')->get();
        }else{
            $movilizador = Sympathizer::findOrFail($id);
            $secciones = Distritacion::all();
            $tocados = Tocados::where('mobilizer_id', $movilizador->id)->where('user_id',Auth::user()->id)->get();
            $distritos = District::all();
            $movilizadores = Mobilizer::where('user_id', Auth::user()->id )->get();
        }
        return view('tocados.show',compact('secciones','distritos','movilizadores','tocados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sympathizer  $sympathizer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distritos = District::all();
        $movilizadores = Mobilizer::all();
        $simpatizante = Sympathizer::findOrFail($id);
        $movilizadorselect = Tocados::where('tocado_id',$id)->first();

       // return $movilizadorselect -> movilizador;
        return view('tocados.sympathizer',compact('distritos','simpatizante','movilizadores', 'movilizadorselect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sympathizer  $sympathizer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $id;
       /* $simpatizante = Sympathizer::findOrFail($id);
        $simpatizante->update($request->all());
        $tocado =  Tocados::where('tocado_id',$simpatizante->id)->first();
        $tocado->delete();
        $simpatizante->tocado()->attach(
            $simpatizante->id,
            [
                'user_id' => $simpatizante->user_id,
                'mobilizer_id'=> $request->movilizador,
                'created_at' => $simpatizante->created_at,
                'updated_at' => $simpatizante->updated_at,
            ]);
*/

            $simpatizante = Sympathizer::findOrFail($id);
            $simpatizante->update($request->all());
           /* $simpatizante->getTocados_check()->sync(
                [ $simpatizante->id =>[
                    //'leader_id'=> $request->lider_id,
                    'user_id' => $request->user_id,
                    'mobilizer_id' => $request->mobilizer_id,
                    'created_at' => $simpatizante->created_at,
                    'updated_at' => $simpatizante->updated_at,
                    ]
                ]);*/
    
    /*        return response()->json([
                'success' => $success,
                'message' => $message
            ]);*/

        return redirect()->route('Sympathizers.show',$request->movilizador )->with('status_info','REGISTRO ACTUALIZADO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sympathizer  $sympathizer
     * @return \Illuminate\Http\Response
     */
    public function destroy($sympathizer)
    {
     //   Sympathizer::findOrFail($sympathizer)->delete();
       // return redirect()->back()->with('status_error','SIMPATIZANTE ELIMINADO CORRECTAMENTE');
        $delete = Sympathizer::findOrFail($sympathizer)->delete();
        if ($delete == 1){
            $success = true;
            $message = "Simpatizante eliminado correctamente";
        } else {
            $success = true;
            $message = "Fallo el proceso de eliminación";
        }
        return response()->json([
            'success' => $success,
            'message' => $message
        ]);

    }
}
