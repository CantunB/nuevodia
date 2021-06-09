<?php

namespace App\Http\Controllers;

use App\Models\Draws;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\Facades\DataTables;

class DrawsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
<<<<<<< HEAD
=======
        $this->middleware('role_or_permission:create_sorteos')->only(['create','store']);
        $this->middleware('role_or_permission:read_sorteos')->only(['index','show']);
        $this->middleware('role_or_permission:update_sorteos')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_sorteos')->only(['destroy']);
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    }

    public function index(Request $request){
        if ($request->ajax()){
           $sorteos = Draws::select('id','nombre','direccion','email','celular');
      /*  $sorteos = DB::select('id','nombre','direccion','email','celular')
            ->selectRaw('count(`email`)')
            ->groupBy('email')
            ->having('email', '>', 1)*/
           // ->selectRaw('count(`celular`) as `ocurrences_celular`')
            //->having('ocurrences_celular', '>', 1)
        //    ->get();
            return DataTables::of($sorteos)->make(true);
        }
        return view('sorteos.index');
    }
}
