<?php

namespace App\Http\Controllers\Lideres;
use App\Http\Controllers\Controller;

use App\Http\Requests\Lideres\UpdateLeaderRequest;
use App\Models\District;
use App\Models\Leader;
use App\Models\Sympathizer;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class LeadersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_lideres')->only(['create','store']);
        $this->middleware('role_or_permission:read_lideres')->only(['index','show']);
        $this->middleware('role_or_permission:update_lideres')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_lideres')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $distritos = District::all();
            $usuarios = User::where('estatus','1')->get();
        /*if (Auth::user()->hasRole(['Super Admin','administrador'])){
              $lideres = Leader::with('lider')->get();
          }else{
              $lideres = Leader::with('lider')->where('user_id',Auth::user()->id)->get();
          }
      */
        if ($request->ajax()){
            if (Auth::user()->hasRole(['Super Admin','administrador'])) {
                $lideres = Leader::with(['getInfo','getUser']);
            }else{
                $lideres = Leader::with(['getInfo','getUser'])->where('user_id',Auth::user()->id);
            }
            return DataTables::of($lideres)
                ->addIndexColumn()
                ->addColumn('nombre', function (Leader $lideres){
                    return $lideres->getInfo->nombre .' '. $lideres->getInfo->paterno .' '. $lideres->getInfo->materno;
                })->filterColumn('nombre', function($query, $keyword) {
                    $query->whereHas('getInfo', function($query) use ($keyword) {
                        $query->whereRaw("CONCAT(COALESCE(`nombre`,''), COALESCE(`paterno`,''), COALESCE(`materno`,'')) like ?", ["%{$keyword}%"]);
                    });
                })
                ->addColumn('clave_elector', function (Leader $lideres){
                    return $lideres->getInfo->clave_elector;
                })
                ->editColumn('fe_nacimiento', function ($lideres){
                    // return $sympathizers->fe_nacimiento->diffInYears();
                    $birthday = $lideres->getInfo->fe_nacimiento;
                    return  $birthday .' '.'( '.Carbon::parse($lideres->getInfo->fe_nacimiento)->diff(Carbon::now())->format('%y años') .' )';
                    // return $sympathizers->fe_nacimiento
                  })
                ->editColumn('capturista', function ($lideres){
                return $lideres->getUser->nombre;
                    })
                   /* ->filterColumn('user_id', function($query, $keyword) {
                    $sql = "users.nombre  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                 })*/
                ->addColumn('distrito', function ($lideres){
                     return $lideres->getInfo->distrito;
                })
                ->addColumn('seccion', function ($lideres){
                    return $lideres->getInfo->seccion;
                })
                ->addColumn('direccion', function($lideres){
                    return  'Calle ' . $lideres->getInfo->calle .' '
                    .$lideres->getInfo->cruzamiento
                    .' No.Ext '
                    .$lideres->getInfo->o_ext
                    .' No.Int '
                    .$lideres->getInfo->no_int
                    .' Colonia '
                    .$lideres->getInfo->colonia
                    .' C.P. ' .$lideres->getInfo->cp;
                })
                ->addColumn('movilizadores', function (Leader $lideres){
                    return  Leader::getMovilizadores($lideres->leader_id)->count();
                })
                ->addColumn('capturado', function ( $lideres){
                    return $lideres->getInfo->created_at->toFormattedDateString();
                })
                ->addColumn('opciones', function ($lideres){
                    $opciones = '';
                    if (Auth::user()->can('read_lideres')){
                        $opciones .= '<button type="button" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-circle"></i></button>';
                    }
                    if (Auth::user()->can('read_movilizadores')){
                        $opciones .= '<a href=" '. route('Mobilizers.show',$lideres->leader_id) .' " class="action-icon icon-dual-success"><i class="mdi mdi-account-group"></i></a>';
                    }
                    if (Auth::user()->can('update_lideres')){
                    //   $opciones  .= '<a href=" '. route('Leaders.edit',$lideres->leader_id) .' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                    $opciones  .= '<button type="button" class="btn btn-sm action-icon btnModalEdit icon-dual-warning"><i class="mdi mdi-account-cog"></i></button>';

                    }
                    return $opciones;
                })
            ->rawColumns(['opciones'])
            ->toJson();
        }
        return view('leaders.index',compact('distritos','usuarios'));
       // return view('leaders.list_leader',compact('distritos','lideres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$user = Auth::user();
        //return view('leader');
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
            return redirect()->route('Leaders.index')
                ->withErrors($validator)
                ->withInput()
                ->with('status_error','FALLO EL REGISTRO DEL LIDER CLAVE DE ELECTOR YA CAPTURADA');
        }
        $simpatizante = Sympathizer::create($request->all());
        $simpatizante->lider()->attach(
            $simpatizante->id,
            [
                'user_id' => Auth::user()->id,
                'created_at'=> $simpatizante->created_at,
                'created_at'=> $simpatizante->updated_at,
            ]);
        return redirect()->route('Leaders.index')->with('status_success','LIDER CREADO CORRECTAMENTE');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function show($leader)
    {
        $leader = Leader::with('getInfo','getUser')->findOrFail($leader);
        return view('leaders.show',compact('leader'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return $id;
        $distritos = District::all();
        $lider = Sympathizer::find($id);
       // return $lider;
        return view('leaders.edit',compact('distritos','lider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaderRequest $request, $id)
    {
        //return $request->all();

       // $simpatizante = Sympathizer::find($id)->update($request->all());
        $simpatizante = Sympathizer::findOrFail($id);
        $simpatizante->update($request->all());
        $simpatizante->getLideres_check()->sync(
            [ $simpatizante->id =>[
                //'leader_id'=> $request->lider_id,
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
       // return redirect()->route('Leaders.index')->with('status_info','LIDER ACTUALIZADO CORRECTAMENTE');
       // return view('list_leader',compact('distritos','lista'))->with('status_success','REGISTRO ACTUALIZADO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /* Leader::findOrFail($leader)->delete();
        return redirect()->back()->with('status_error','ELIMINADO CORRECTAMENTE'); */
        $delete = Leader::findOrFail($id)->delete();
        if ($delete == 1){
            $success = true;
            $message = "Lider eliminado correctamente";
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
