<?php

namespace App\Http\Controllers\Despensas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distritacion;
use App\Models\Pantry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\User;
class PantriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_despensas')->only(['create','store']);
        $this->middleware('role_or_permission:read_despensas')->only(['index','show']);
        $this->middleware('role_or_permission:update_despensas')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_despensas')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $secciones = Distritacion ::all();
        if ($request->ajax()){
            $despensas = Pantry::with(['getUser']);
            return DataTables::of($despensas)
            ->editColumn('nombre', function ($despensas){
                return $despensas->nombre .' '.  $despensas->paterno .' '. $despensas->materno;
            })
            ->filterColumn('nombre', function($query, $keyword) {
                $query->whereRaw("CONCAT(COALESCE(`nombre`,''), COALESCE(`paterno`,''), COALESCE(`materno`,'')) like ?", ["%{$keyword}%"]);
            })
            ->addColumn('opciones', function ($despensas){
                $opciones = '';
                if (Auth::user()->can('update_despensas')){
                    $opciones .= '<button type="button" class="btn btn-sm action-icon editar icon-dual-warning"><i class="mdi mdi-cog-outline"></i></button>';
                }
                return $opciones;
            })
            ->rawColumns(['opciones'])
            ->toJson();
        }
        return view('despensas.index', compact('secciones'));
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
        Pantry::create($request->all());
        return redirect()->back()->with('status_success','Nuevo Registro');
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
        $despensa = Pantry::findOrFail($id);
        $despensa->update($request->all());
        if ($despensa == true){
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
        //
    }
}
