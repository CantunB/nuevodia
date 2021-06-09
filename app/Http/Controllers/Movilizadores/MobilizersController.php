<?php

namespace App\Http\Controllers\Movilizadores;

use App\Http\Controllers\Controller;
use App\Http\Requests\Movilizador\UpdateMobilizerRequest;
use App\Models\District;
use App\Models\Leader;
use App\Models\Mobilizer;
use App\Models\Tocados;
use App\Models\Sympathizer;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MobilizersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
<<<<<<< HEAD
    }

=======
        $this->middleware('role_or_permission:create_movilizadores')->only(['create','store']);
        $this->middleware('role_or_permission:read_movilizadores')->only(['index','show']);
        $this->middleware('role_or_permission:update_movilizadores')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_movilizadores')->only(['destroy']);
    }


>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $distritos = District::all();
        $usuarios = User::where('estatus','1')->get();
        //$lideres = Leader::all();
        if (Auth::user()->hasRole(['Super Admin','administrador'])){
            $lideres = Leader::with('getInfo')->get();
        }else{
             $lideres = Leader::with('getInfo')->where('user_id',Auth::user()->id)->get();
        }

        if ($request->ajax()){
            if (Auth::user()->hasRole(['Super Admin','administrador'])) {
                $data = Mobilizer::with(['getInfo','getUser','getInfoLider']);
            }else{
                $data = Mobilizer::with(['getInfo','getUser','getInfoLider'])->where('user_id',Auth::user()->id);
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('lider', function($data){
                    return $data->getInfoLider->nombre .' '. $data->getInfoLider->paterno .' '. $data->getInfoLider->materno;
                })
                ->addColumn('nombre', function ($data){
                    return $data->getInfo->nombre .' '. $data->getInfo->paterno .' '. $data->getInfo->materno;
                })
                ->setRowClass(function ($data) {
                    $complete = Tocados::where('mobilizer_id',$data->mobilizer_id)->count();
                    return $complete >= 80 ? 'alert-success' : '';
                })
                ->filterColumn('nombre', function($query, $keyword) {
                    $query->whereHas('getInfo', function($query) use ($keyword) {
<<<<<<< HEAD
                        //$query->whereRaw("CONCAT(nombre, paterno, materno) like ?", ["%{$keyword}%"]);  
                        $query->whereRaw("CONCAT(COALESCE(`nombre`,''), COALESCE(`paterno`,''), COALESCE(`materno`,'')) like ?", ["%{$keyword}%"]);
                    });
                })
                
=======
                        //$query->whereRaw("CONCAT(nombre, paterno, materno) like ?", ["%{$keyword}%"]);
                        $query->whereRaw("CONCAT(COALESCE(`nombre`,''), COALESCE(`paterno`,''), COALESCE(`materno`,'')) like ?", ["%{$keyword}%"]);
                    });
                })

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                ->addColumn('clave_elector', function ($data){
                    return $data->getInfo->clave_elector;
                })
                ->editColumn('fe_nacimiento', function ($data){
                    // return $sympathizers->fe_nacimiento->diffInYears();
                    $birthday = $data->getInfo->fe_nacimiento;
                    return  $birthday .' '.'( '.Carbon::parse($data->getInfo->fe_nacimiento)->diff(Carbon::now())->format('%y años') .' )';
                    // return $sympathizers->fe_nacimiento
                  })
                ->editColumn('capturista', function ($data){
                        return $data->getUser->nombre;
                })
                ->addColumn('distrito', function ($data){
                     return $data->getInfo->distrito;
                })
                ->addColumn('seccion', function ($data){
                    return $data->getInfo->seccion;
                })
                ->addColumn('direccion', function($data){
                    return  'Calle ' . $data->getInfo->calle .' '
                    .$data->getInfo->cruzamiento
                    .' No.Ext '
                    .$data->getInfo->o_ext
                    .' No.Int '
                    .$data->getInfo->no_int
                    .' Colonia '
                    .$data->getInfo->colonia
                    .' C.P. ' .$data->getInfo->cp;
                })

                ->addColumn('capturado', function (Mobilizer $data){
                    return $data->getInfo->created_at->toFormattedDateString();
                })
                ->addColumn('tocados', function (Mobilizer $data){
                    return  Mobilizer::getTocados($data->mobilizer_id)->count();
                })
                ->addColumn('opciones', function (Mobilizer $data){
                    $opciones = '';
                    if (Auth::user()->can('read_movilizadores')){
                        $opciones .= '<button type="button" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-circle"></i></button>';
                    }
                    if (Auth::user()->can('read_tocados')){
                        $opciones .= '<a href=" '.route('Sympathizers.show', $data->mobilizer_id).' " class="action-icon icon-dual-success"><i class="mdi mdi-account-group"></i></a>';
                    }
                    if (Auth::user()->can('update_movilizadores')){
                    //   $opciones  .= '<a href=" '. route('Leaders.edit',$lideres->leader_id) .' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                    $opciones  .= '<button type="button" class="btn btn-sm action-icon btnModalEdit icon-dual-warning"><i class="mdi mdi-account-cog"></i></button>';

                    }
                    return $opciones;
                })
            ->rawColumns(['opciones'])
            ->toJson();
        }
        return view('mobilizers.index', compact('distritos','lideres','usuarios'));
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
     * @param  int  $id
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
    public function update(UpdateMobilizerRequest $request, $id)
    {
        $simpatizante = Sympathizer::findOrFail($id);
        $simpatizante->update($request->all());
        $simpatizante->getMovilizadores_check()->sync(
            [ $simpatizante->id =>[
                'leader_id'=> $request->leader_id,
                'user_id' => $request->user_id,
                //'mobilizer_id' => $simpatizante->id,
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
