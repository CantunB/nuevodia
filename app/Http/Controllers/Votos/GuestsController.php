<?php

namespace App\Http\Controllers\Votos;

use App\Http\Controllers\Controller;
use App\Models\Guests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class GuestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_invitados')->only(['create','store']);
        $this->middleware('role_or_permission:read_invitados')->only(['index','show']);
        $this->middleware('role_or_permission:update_invitados')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_invitados')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(Request $request,$id)
    {
        if ($request->ajax()){
            $invitados = Guests::with(['getCoordinador'])->where('id_coordinador',$id);
            return  DataTables::of($invitados)
                ->addIndexColumn()
                ->editColumn('coordinador', function($invitados){
                    return $invitados->getCoordinador->nombre .' '. $invitados->getCoordinador->paterno .' '. $invitados->getCoordinador->materno;
                })
                ->editColumn('nombre', function ($invitados){
                    return $invitados->nombre .' '.  $invitados->paterno .' '. $invitados->materno;
                })
                ->addColumn('buttons', function ($invitados){
                    $opciones = '';
                    if (Auth::user()->can('update_invitados')){
                     $opciones .= '
                        <div class="radio radio-info form-check-inline">
                            <input class="radio radio-info" type="checkbox" id="'.$invitados->id.'" value="1" name="voto"> SI
                        </div>';
                    $opciones .= '
                        <div class="radio radio-primary form-check-inline">
                            <input class="radio " type="checkbox" id="'.$invitados->id.'" value="0" name="voto"> NO
                        </div>';
                    }
                return $opciones;
                })
                ->rawColumns(['buttons'])
                ->toJson();
        }

       /* DB::statement(DB::raw('set @rownum=0'));
            $lista = Sympathizer::where('clave_elector', 'not like', "%@%")
                ->where('gestion',$request->infogestion)
                ->select(
                    DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                    DB::raw("CONCAT(sympathizers.nombre,' ',sympathizers.paterno,' ',sympathizers.materno) as fullname"),
                    'sympathizers.gestion',
                    DB::raw('sympathizers.estatus_gestion'),
                    'sympathizers.user_id',
                    )
                    ->get();
            return response()->json([
                'data' => $lista,
            ], 200);
            */
        return view('elecciones.invitados.show', compact('id'));
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
