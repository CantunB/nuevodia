<?php

namespace App\Http\Controllers\Mypymes;

use App\Http\Controllers\Controller;
use App\Models\Mypyme;
<<<<<<< HEAD
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
class MypymesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

=======
use App\User;
use App\Models\Distritacion;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class MypymesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_mypymes')->only(['create','store']);
        $this->middleware('role_or_permission:read_mypymes')->only(['index','show']);
        $this->middleware('role_or_permission:update_mypymes')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_mypymes')->only(['destroy']);
    }
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
<<<<<<< HEAD
        if ($request->ajax()){
        $data = Mypyme::all();
=======
        $secciones = Distritacion ::all();
        if ($request->ajax()){
        $data = Mypyme::with(['getUser']);
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('direccion', function($data){
                    return  $data->colonia     .' '.
                            $data->cruzamiento .' '.
                            $data->no_ext      .' '.
                            $data->no_int      .' '.
                            $data->colonia     .' '.
                            $data->cp;
                })
                ->addColumn('opciones', function ($data){
                    $opciones = '';
                    if (Auth::user()->can('read_mypymes')){
                        $opciones .= '<button type="button" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-circle"></i></button>';
                    }
                    if (Auth::user()->can('update_mypymes')){
                        $opciones .= '<button type="button" class="btn btn-sm action-icon btnModalEdit icon-dual-warning"><i class="mdi mdi-account-cog"></i></button>';
                    }
                   /* if (Auth::user()->can('read_mypymes')){
                        $opciones .= '<a href=" '.route('Sympathizers.show', $data->id).' " class="action-icon icon-dual-success"><i class="mdi mdi-account-group"></i></a>';
                    }
                    if (Auth::user()->can('read_mypymes')){
                    //   $opciones  .= '<a href=" '. route('Leaders.edit',$lideres->leader_id) .' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                    $opciones  .= '<button type="button" class="btn btn-sm action-icon btnModalEdit icon-dual-warning"><i class="mdi mdi-account-cog"></i></button>';

                    }*/
                    return $opciones;
                })
            ->rawColumns(['opciones'])
            ->toJson();
        }
<<<<<<< HEAD
        return view('mypymes.index');
=======
        return view('mypymes.index', compact('secciones'));
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
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
        //return $links = implode(',',  $request->areas);
        $mypyme = Mypyme::create($request->except('areas'));

        $mypyme->areas = implode(',',  $request->areas);
        $mypyme->save();
        return redirect()->route('Mypymes.index')->with('status_success','REGISTRO CREADO CORRECTAMENTE');
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
<<<<<<< HEAD
        //
=======
        $mypyme = Mypyme::findOrFail($id);
        $mypyme->update($request->except('areas'));
        $mypyme->areas = implode(',',  $request->areas);
        $mypyme->save();
        if ($mypyme == true){
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
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
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
