<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Simpatizantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Datatables;

class SimpatizantesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_simpatizantes_sc')->only(['create','store']);
        $this->middleware('role_or_permission:read_simpatizantes_sc')->only(['index','show']);
        $this->middleware('role_or_permission:update_simpatizantes_sc')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_simpatizantes_sc')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $distritos = District::all();
        if ($request->ajax()){
            $simpatizantes = Simpatizantes::all();
            return DataTables::of($simpatizantes)
                ->addIndexColumn()
                ->addColumn('fullname',function($simpatizantes){
                    return $simpatizantes->nombre .' '. $simpatizantes->paterno .' '. $simpatizantes->materno;
                })
                ->addColumn('fulladdress',function($simpatizantes){
                    return $simpatizantes->calle .' '. $simpatizantes->calle .' '. $simpatizantes->no_ext .' '.$simpatizantes->no_int .' '.$simpatizantes->colonia .' '.$simpatizantes->cp;
                })
                ->addColumn('actions',function($simpatizantes){
                    $opciones = '';
                    if (Auth::user()->can('update_simpatizantes_sc')){
                        $opciones .= '<button type="button" class="btn btn-sm action-icon getInfo icon-dual-warning"><i class="mdi mdi-account-cog"></i></button>';
                    }
                    if (Auth::user()->can('delete_simpatizantes_sc')){
                    //   $opciones  .= '<a href=" '. route('Leaders.edit',$lideres->leader_id) .' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                    $opciones  .= '<button type="button" class="btn btn-sm action-icon btnModalEdit icon-dual-secondary"><i class="mdi mdi-trash-can"></i></button>';
                    }
                    return $opciones;
                })
                ->rawColumns(['actions'])
            ->toJson();
        }
        return view('simpatizantes.index', compact('distritos'));
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
            'celular' => 'unique:simpatizantes,celular'
        ];
        $messages = [
            'celular.unique' => 'El :attribute ya fue capturado!',
        ];
        $attributes = [
            'celular' => 'numero de telefono',
        ];
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('status_error','FALLO EL REGISTRO DEL TOCADO');
        }
        Simpatizantes::create($request->all());
        return redirect()->route('Simpatizantes.index')->with('status_succes','ALMACENADO CORRECTAMENTE');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Simpatizantes  $simpatizantes
     * @return \Illuminate\Http\Response
     */
    public function show(Simpatizantes $simpatizantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Simpatizantes  $simpatizantes
     * @return \Illuminate\Http\Response
     */
    public function edit($simpatizantes)
    {
        $distritos = District::all();
        $simpatizante = Simpatizantes::findOrFail($simpatizantes);
        return view('simpatizantes.edit',compact('simpatizante','distritos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Simpatizantes  $simpatizantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $simpatizantes)
    {
        $simpatizante = Simpatizantes::findOrFail($simpatizantes)->update($request->all());
        return redirect()->route('Simpatizantes.index')->with('status_info','Tocado Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Simpatizantes  $simpatizantes
     * @return \Illuminate\Http\Response
     */
    public function destroy( $simpatizantes)
    {
        Simpatizantes::findOrFail($simpatizantes)->delete();
        return redirect()->back()->with('status_info','ELIMINADO CORRECTAMENTE');
    }
}
