<?php

namespace App\Http\Controllers;

use App\Models\Ln;
use App\Models\Sympathizer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SeccionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $secciones = Ln::select(['seccion','total'])->groupBy('seccion')->get();
            return  DataTables::of($secciones)
                ->editColumn('seccion', function ($secciones){
                    return $seccion = $secciones->seccion;
                })
                ->addColumn('ln', function ($secciones){
                    //$ln = Ln::SeccionCount($secciones->seccion);
                    $ln = $secciones->total;
                    return $ln;
                    //return Ln::with('SeccionCount');
                  //  return Ln::select('seccion')->groupBy('seccion')->whereSeccion($secciones->seccion)->count();
                   // return '0';
                })
                ->addColumn('proyeccion', function ($secciones){
                    $porcentaje = '.25';
                    //$ln = Ln::SeccionCount($secciones->seccion);
                    $ln = $secciones->total;
                   // $ln =  Ln::select('seccion')->groupBy('seccion')->whereSeccion($secciones->seccion)->count();
                    $proyeccion = $ln * $porcentaje;
                    return round($proyeccion,0,PHP_ROUND_HALF_UP);
                    return '0';
                })
                ->addColumn('simpatizantes', function ($secciones){
                   return $simpatizantes = Sympathizer::countSeccion($secciones->seccion);
                  ///  return $secciones->seccion;
                //  $simpatizantes = Sympathizer::select('seccion')->groupBy('seccion')->where('seccion', $secciones->seccion)->count();
                //    return $simpatizantes;
                })
                ->addColumn('status', function ($secciones){
                    return '0';
                })
                ->addColumn('action', function ($secciones){
                    return '<button type="button" id="btngrafica" class="btn btngrafica action-icon"><i class="mdi mdi-chart-areaspline icon-dual-info"></i></button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('secciones.index');
    }

    public function getData(Request $request)
    {
        $seccion = $request->seccion;
        $ln = Ln::where('seccion',$request->seccion)->first();
        //$ln = Ln::SeccionCount($request->seccion);
        $porcentaje = '.25';
        $proyeccion = $ln->total * $porcentaje;
        $simpatizantes = Sympathizer::countSeccion($request->seccion);
        $proyeccion = round($proyeccion,0,PHP_ROUND_HALF_UP);
        return response()->json([
            'seccion' => $seccion,
            'ln' => $ln->total,
            'proyeccion' => $proyeccion,
            'simpatizantes' => $simpatizantes
        ], 200);
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
        return  'seccion desde show'.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return  'seccion desde edit'.$id;
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
