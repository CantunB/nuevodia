<?php

namespace App\Http\Controllers;

use App\Models\Mobilizer;
use App\Models\Sympathizer;
use App\Models\Tocados;
use App\User;
use Illuminate\Http\Request;

class TocadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_tocados')->only(['create','store']);
        $this->middleware('role_or_permission:read_tocados')->only(['index','show']);
        $this->middleware('role_or_permission:update_tocados')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_tocados')->only(['destroy']);
    }
    /**
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
        Tocados::create($request->all());
        return redirect()->back()->with('status_success','Nuevo Tocado');
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
        $usuarios = User::all();
        $movilizadores = Mobilizer::all();
        $simpatizante = Tocados::findOrFail($id);
        return view('administrador.tocados.partials.edit',compact('usuarios','movilizadores','simpatizante'));
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
        //Tocados::findOrFail($id)->update($request->all());
        $simpatizante = Sympathizer::findOrFail($id);
        $tocado =  Tocados::where('tocado_id',$simpatizante->id)->first();
        $tocado->delete();
        // $simpatizante->movilizador()->delete();
        $simpatizante->tocado()->attach(
            $simpatizante->id,
            [
                //  'mobilizer_id' => $simpatizante->id,
                'user_id' => $request->user_id,
                'mobilizer_id'=> $request->movilizador,
                'created_at' => $simpatizante->created_at,
                'updated_at' => $simpatizante->updated_at,
            ]);
        return redirect()->route('admin.tocados')->with('status_info','ACTUALIZADO CORRECTAMENTE');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // return $id;
        //$delete = Tocados::findOrFail($id)->delete();
        //$delete = Tocados::findOrFail($id);
        $delete = Tocados::findOrFail($id)->delete();
        //return $delete;
        //return back();
        if ($delete == 1){
            $success = true;
            $message = "Tocado eliminado correctamente";
        } else {
            $success = true;
            $message = "Fallo el proceso";
        }

        return response()->json([
            'success' => $success,
            'message' => $message
        ]);


      //  return redirect()->back()->with('status_error','ELIMINADO CORRECTAMENTE');
    }
}
