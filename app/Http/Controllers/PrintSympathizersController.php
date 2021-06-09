<?php

namespace App\Http\Controllers;
use App\Models\Leader;
use App\Models\Mobilizer;
use App\Models\Tocados;
use App\Models\Sympathizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintSympathizersController extends Controller
{
    public function PDF(Request $request)
    {


        $movilizadorselect =  $request->movilizador;
        $fecha1 =  $request->fecha1;
        $fecha2 =  $request->fecha2;
         //return $lider;

        if (Auth::user()->hasRole('Super Admin')) {
            $lista = Tocados::where('mobilizer_id',$movilizadorselect)
                ->whereDate('created_at','>=',$fecha1)
                ->whereDate('created_at','>=',$fecha1)
                ->whereDate('created_at','<=',$fecha2)->get();
        }else{
            $lista = Tocados::where('mobilizer_id',$movilizadorselect)
                ->where('user_id', Auth::user()->id)
                ->whereDate('created_at','>=',$fecha1)
                ->whereDate('created_at','<=',$fecha2)->get();
        }


        //$datos_lider = Sympathizer::where('clave_elector',$liderselect)->first();
        //$lider = Mobilizer::find(1);
        // return $lista;
        //return $lider->lideres;

      //  return view('list_mobilizer',compact('distritos','lideres','lista', 'fecha1', 'fecha2', 'liderselect' ));

     $pdf = \PDF::loadView('tocados.print_sympathizer',compact('lista','fecha1','fecha2'))->setPaper('a4', 'landscape');
      return $pdf->download('tocados.pdf');

        /*if(($request->fecha) and ($request->movilizador))
        {
            $clave =  $request->movilizador;
            $fecha =  $request->fecha;

            $movilizador = Sympathizer::where('clave_elector',$clave)->first();

            $lider = Mobilizer::where('movilizador',$clave)->first();

             $lider =   Sympathizer::where('clave_elector',$lider->lider)->first();

            $lista = Tocados::where('movilizador',$clave)->whereDate('created_at',$fecha)->get();

            $pdf = \PDF::loadView('print_sympathizer',compact('lista','lider','movilizador'))->setPaper('a4', 'landscape');

            return $pdf->download('tocados.pdf');
        }
        else
        {
            $clave =  $request->movilizador;
            $fecha =  $request->fecha;

            $movilizador = Sympathizer::where('clave_elector',$clave)->first();
            $lista = Mobilizer::all();
            $pdf = \PDF::loadView('print_sympathizer',compact('lista','lider','movilizador'))->setPaper('a4', 'landscape');

            return $pdf->download('tocados.pdf');
        }*/
    }
}
