<?php

namespace App\Http\Controllers;

use App\Exports\Callcenter\Callcenter;
use App\Exports\Leader_userExport;
use App\Exports\LeadersExport;
use App\Exports\MobilizersExport;
use App\Exports\SympathizerGeneralExport;
use App\Exports\SympathizersExport;
use App\Exports\TocadosExport;
use App\Exports\UsersExport;
use App\Models\District;
use App\Models\Leader;
use App\Models\Mobilizer;
use App\Models\Simpatizantes;
use App\Models\Sympathizer;
use App\Models\Tocados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
class ReportsController extends Controller
{
    public function index(Request $request)
    {

        if(($request->fecha) and ($request->mostrar)){
            if($request->mostrar == 'LIDERES')
            {
                $lista = Leader::all();
                return view('Reports',compact('lista'));
            }
            if($request->mostrar == 'MOVILIZADORES')
            {
                $lista = Mobilizer::all();
                return view('Reports',compact('lista'));
            }
            if($request->mostrar == 'TOCADOS')
            {
                $lista = Tocados::all();
                return view('Reports',compact('lista'));
            }
            //return $request->fecha." ".$request->mostrar;
        }


            $lista = Tocados::all();
            return view('Reports',compact('lista'));

    }

    public function tocados_sc_pdf()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $simpatizantes = Simpatizantes::all();
        }else{
            $simpatizantes = Simpatizantes::where('user_id',Auth::user()->id)->get();
        }
        $pdf = \PDF::loadView('reportes.tocados_sc_pdf',compact('simpatizantes'))->setPaper('a4', 'landscape');
        return $pdf->stream('Tocados_sin_credencial.pdf');

    }

    public function leaders_pdf()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $leaders = Leader::with('getInfo')->get();
        }else{
            $leaders = Leader::with('getInfo')->where('user_id',Auth::user()->id)->orderBy('mobilizer_id')->groupBy('leader_id')->get();
        }
        $pdf = \PDF::loadView('reportes.lideres',compact('leaders'))->setPaper('a4', 'landscape');
        return $pdf->stream('Lideres.pdf');

    }

    public function single_lider_info($lider)
    {
        $leader = Leader::with('getInfo','getUser')->findOrFail($lider);
           // $leaders = Leader::with('getInfo')->where('user_id',Auth::user()->id)->orderBy('mobilizer_id')->groupBy('leader_id')->get();
        $pdf = \PDF::loadView('reportes.single_lider_info',compact('leader'));
        return $pdf->stream('Informacion_lider.pdf');

    }

    public function mobilizers_pdf()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $mobilizers = Mobilizer::get();
        }else{
            $mobilizers = Mobilizer::where("user_id",Auth::user()->id)->get();
        }
        $pdf = \PDF::loadView('reportes.mobilizers',compact('mobilizers'))->setPaper('a4', 'landscape');
        return $pdf->stream('Movilizadores.pdf');

    }

  /*  public function leader_user($id)
    {
        $movilizadores = Mobilizer::with('getInfo')->where('user_id', $id)->get();
        $pdf = \PDF::loadView('reportes.leader_user',compact('movilizadores'));
        return $pdf->stream('Lideres.pdf');

    }*/
    public function leader_user(Leader_userExport $export)
    {
        return $export->download('Lideres_Movilizadores.xlsx');
    }

    public  function  mobilizers_lider_pdf($id){
            $movilizadores = Mobilizer::where('leader_id', $id)->get();
    //    $movilizadores = Mobilizer::where('leader_id', $id)
      //      ->where('user_id', Auth::user()->id)->get();
           // ->whereDate('created_at', '>=', $fecha1)
           // ->whereDate('created_at', '<=', $fecha2)->get();
        $pdf = \PDF::loadView('reportes.mobilizers_lider',compact('movilizadores'))->setPaper('a4', 'landscape');
        return $pdf->stream('Reporte de Movilizadores.pdf');
    }

   /* public function export_users()
    {
        return Excel::download(new UsersExport, 'usuarios.xlsx');
    }*/
    public function export_users(UsersExport $usersExport)
    {
        return $usersExport->download('usuarios.csv');
        //return $usersExport->download('usuarios.xlsx');
    }

    public function export_sympathizers(SympathizersExport $sympathizersExport)
    {
        return $sympathizersExport->download('Simpatizantes.csv', \Maatwebsite\Excel\Excel::CSV);
        //return $sympathizersExport->download('Simpatizantes.xlsx');
    }
    public function export_leaders(LeadersExport $leadersExport)
    {
        return $leadersExport->download('Lideres.csv', \Maatwebsite\Excel\Excel::CSV );
       // return $leadersExport->download('Lideres.xlsx');
    }
    public function export_mobilizers(MobilizersExport $mobilizersExport)
    {
        return $mobilizersExport->download('Movilizadores.csv', \Maatwebsite\Excel\Excel::CSV);
        //return Excel::download(new MobilizersExport(), 'Movilizadores.xlsx');
    }
    public function export_tocados(TocadosExport $tocadosExport)
    {
        return $tocadosExport->download('Tocados.csv', \Maatwebsite\Excel\Excel::CSV);
        //return $tocadosExport->download('Tocados.xlsx');
    }

    public function cc_confirmados(Callcenter $confirmados)
    {
        return $confirmados->download('ConfirmadosReporte.xlsx');

    }
}
