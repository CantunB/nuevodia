<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintOwnerController extends Controller
{
    public function PDF()
    {
        if (Auth::user()->hasRole(['Super Admin','administrador'])) {
            $propietarios = Owner::all();
        }else{
            $propietarios = Owner::where('user_id',Auth::user()->id)->get();
        }
        $pdf = \PDF::loadView('owners.print_owner',compact('propietarios'))->setPaper('a4', 'landscape');
        return $pdf->stream('Propietarios.pdf');

        /* $html = \PDF::loadView('print_leader');
         $pdf = app('dompdf.wrapper');
         $pdf -> loadHTML($html);
         return $pdf->stream('lideres.pdf');*/
    }
}
