<?php

namespace App\Http\Controllers\Votos;

use App\Http\Controllers\Controller;
use App\Models\Coordinators;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CoordinatorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_coordinadores')->only(['create','store']);
        $this->middleware('role_or_permission:read_coordinadores')->only(['index','show']);
        $this->middleware('role_or_permission:update_coordinadores')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_coordinadores')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $coordinadores = Coordinators::all();
            return  DataTables::of($coordinadores)
                ->addIndexColumn()
                ->editColumn('nombre', function ($coordinadores){
                    return $coordinadores->nombre .' '.  $coordinadores->paterno .' '. $coordinadores->materno;
                })
                ->editColumn('grupo', function ($coordinadores){
                    if($coordinadores->grupo == 4){
                        return 'Suemy Rosas';
                    }
                })
                ->addColumn('buttons', function ($coordinadores){
                    $opciones = '';
                    if (Auth::user()->can('update_coordinadores')){
                     $opciones .= '
                        <div class="radio radio-info form-check-inline">
                            <input class="radio radio-info" onclick="votos(this)" type="checkbox" id="'.$coordinadores->id.'" value="1" name="voto"> SI
                        </div>';
                    $opciones .= '
                        <div class="radio radio-primary form-check-inline">
                            <input class="radio " type="checkbox" onclick="votos(this)" id="'.$coordinadores->id.'" value="0" name="voto"> NO
                        </div>';
                    }
                return $opciones;
                })
                ->addColumn('invitados', function($coordinadores){
                    $opciones = '';
                    if (Auth::user()->can('read_invitados')){
                        $opciones = '<a href="'.route('Invitados.show', $coordinadores->id).' " type="button" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-box"></i></a>';
                    }
                    return $opciones;
                })
                ->rawColumns(['buttons','invitados'])
                ->toJson();
        }
        return view('elecciones.coordinadores.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
