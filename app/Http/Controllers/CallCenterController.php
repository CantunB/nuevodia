<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sympathizer;
use App\Models\Owner;
use App\Models\District;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CallCenterController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
       // $distritos = District::all();
        //$owners = Owner::all();

        $simpathizers = DB::table('sympathizers')
            ->select('nombre','paterno','materno','celular','clave_elector')
            ->whereNotNull('celular')
            //  ->groupBy('clave_elector')
            ->orderBy('nombre', 'ASC');
              //->get();
         //$simpathizers = $simpathizers->count();

        /* $propietarios = Owner::whereNotNull('celular')
            ->groupBy('clave_elector')
            ->orderBy('nombre')
            ->get();
        $propietarios = $propietarios->count();*/

        $simpatizantes = DB::table('owners')
            ->select('nombre','paterno','materno','celular','clave_elector')
            ->whereNotNull('celular')
            ->orderby('nombre','ASC')
            ->union($simpathizers)
            ->get();


        if ($request->ajax()){
<<<<<<< HEAD
=======
            $simpatizantes = Sympathizer::whereNotNull('celular')->where('user_id','3')->orWhere('user_id','4');
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
            return DataTables::of($simpatizantes)
                ->addIndexColumn()
                ->addColumn('fullname',function($simpatizantes){
                    return $simpatizantes->nombre .' '. $simpatizantes->paterno .' '. $simpatizantes->materno;
                })
            ->toJson();
        }

        //return $simpatizantes;
        return view('callcenter.index');
    }

    public function show()
    {

    }
}
