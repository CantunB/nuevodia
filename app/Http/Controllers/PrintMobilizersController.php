<?php

namespace App\Http\Controllers;

use App\Exports\MobilizerExport;
use App\Models\Mobilizer;
use App\Models\Sympathizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
class PrintMobilizersController extends Controller
{

    public function PDF(Request $request)
    {

       // $distritos = District::all();
       // $lideres = Leader::all();
        $lista = Mobilizer::all();


        if(($request->fecha1) and ($request->fecha2) and ($request->lider)) {

            $liderselect = $request->lider;
            $fecha1 = $request->fecha1;
            $fecha2 = $request->fecha2;
            //return $lider;
            if (Auth::user()->hasRole('Super Admin')) {
                $lista = Mobilizer::where('leader_id', $liderselect)
                    ->whereDate('created_at', '>=', $fecha1)
                    ->whereDate('created_at', '<=', $fecha2)->get();
                $datos_lider = Sympathizer::where('id', $liderselect)->first();
            }else{
                $lista = Mobilizer::where('leader_id', $liderselect)
                    ->where('user_id', Auth::user()->id)
                    ->whereDate('created_at', '>=', $fecha1)
                    ->whereDate('created_at', '<=', $fecha2)->get();
            $datos_lider = Sympathizer::where('id', $liderselect)->first();
            }
               //$lider = Mobilizer::find(1);
               // return $lista;
               //return $lider->lideres;

             //  return view('list_mobilizer',compact('distritos','lideres','lista', 'fecha1', 'fecha2', 'liderselect' ));

            $pdf = \PDF::loadView('print_mobilizer',compact('lista','datos_lider','fecha1','fecha2'))->setPaper('a4', 'landscape');
             return $pdf->stream('movilizadores.pdf');
        }

/*
        if(($request->fecha) and ($request->lider))
        {
            $clave =  $request->lider;
            $fecha =  $request->fecha;
            $lider = Sympathizer::where('clave_elector',$clave)->first();
            $lista = Mobilizer::where('lider',$clave)->whereDate('created_at',$fecha)->get();
            $pdf = \PDF::loadView('print_mobilizer',compact('lista','lider'))->setPaper('a4', 'landscape');
            return $pdf->download('movilizadores.pdf');
        }else{
            $clave =  $request->lider;
            $fecha =  $request->fecha;
            $lider = Sympathizer::where('clave_elector',$clave)->first();
            $lista = Mobilizer::all();
            $pdf = \PDF::loadView('print_mobilizer',compact('lista','lider'))->setPaper('a4', 'landscape');
            //return $pdf->stream('movilizadores.pdf');
            return $pdf->download('movilizadores.pdf');
        }*/
    }

    public function export()
    {
        return Excel::download(new MobilizerExport,'Movilizadores.xlsx');
    }
}
