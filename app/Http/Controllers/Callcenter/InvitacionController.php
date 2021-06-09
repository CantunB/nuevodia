<?php

namespace App\Http\Controllers\Callcenter;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class InvitacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_encuestas')->only(['create','store']);
        $this->middleware('role_or_permission:read_encuestas')->only(['index','show']);
        $this->middleware('role_or_permission:update_encuestas')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_encuestas')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $invitacion = Invitation::all()->where('invitation',0)
            //->inRandomOrder()
            ->random(1);
            return DataTables::of($invitacion)
                ->addIndexColumn()
                ->addColumn('nombre', function ($invitacion){
                    return $invitacion->nombre .' '. $invitacion->paterno .' '. $invitacion->materno;
                })
                ->addColumn('opciones', function (){
                    $opciones = '';
                    if (Auth::user()->can('create_invitacion')){
                        $opciones .= '<button type="button" class="btn btn-sm action-icon invitacion icon-dual-blue"><i class="mdi mdi-phone-in-talk"></i></button>';
                    }
                    return $opciones;
                })
            ->rawColumns(['opciones'])
            ->toJson();
        }
        return view('callcenter.invitacion.index');
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
        $simpatizante = Invitation::where('clave_elector', $request->clave_elector) ->update([
            'invitation' => $request->invitation
         ]);
        return redirect()->back()->with('status_success','REGISTRADO CORRECTAMENTE');
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
    public function update(Request $request, $simpatizante)
    {

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
