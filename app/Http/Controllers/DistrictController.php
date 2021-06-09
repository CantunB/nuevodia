<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Distritacion;
use App\Models\Sympathizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_distritos')->only(['create','store']);
        $this->middleware('role_or_permission:read_distritos')->only(['index','show']);
        $this->middleware('role_or_permission:update_distritos')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_distritos')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()){
            $district = District::get();

            return DataTables::of($district)
            ->addColumn('contador', function ($district){
                return District::getSecciones($district->distrito)->count();
                //$admin = Arr::get($info, 'users.admin');
                // return $value;
                // $collection = collect($no_secciones);
            })
            ->addColumn('secciones', function ($district){
                $secciones = District::getSecciones($district->distrito);
               // $secciones =  Sympathizer::where('clave_elector', 'not like', "%@%")->select('seccion')->groupBy('seccion')->where('distrito',$district->distrito)->get();
                $secciones = $secciones->pluck('seccion_electoral');

                $lista = '<ul>';
                    for($i=0; $i<count($secciones); $i++){
                            $lista .= '<li>'.$secciones[$i].' <button type="button" onclick="btonSeccion('.$secciones[$i].')" class="btn action-icon"><i class="mdi mdi-select-marker icon-dual-primary"></i></button>  </li>';
                        }
                    $lista .= '</ul>';
                 return $lista;

            })
            ->rawColumns(['secciones'])
            ->make(true);
        }
        $color_fondo = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        $distritos = District::all();
        /*   foreach ($distritos as $distrito){
               $contador[] = District::contador($distrito->distrito);
           }
  */
        for ($i=0; $i<$distritos->count(); $i++){
            $colores[] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        }
        return view('distritos.index',compact('distritos','colores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'distrito' => 'required|unique:districts,distrito'
        ];
        $messages = [
            'distrito.required' => 'Necesitamos un :attribute para el registro',
            'distrito.unique' => 'El :attribute ya fue capturado!',
        ];
        $attributes = [
            'distrito' => 'Distrtito',
        ];
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('status_error','FALLO EL REGISTRO DEL DISTRITO');
        }
        $distritos = District::create($request->all());
        return redirect()->route('Distritos.index')->with('status_success','Distrito Agregado');
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
