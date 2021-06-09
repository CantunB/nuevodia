<?php

namespace App\Http\Controllers;
use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintLeadersController extends Controller
{
    public function PDF()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $lideres = Leader::all();
        }else{
            $lideres = Leader::where('user_id',Auth::user()->id)->get();
        }
        $pdf = \PDF::loadView('leaders.print_leader',compact('lideres'))->setPaper('a4', 'landscape');
        return $pdf->stream('lideres.pdf');

       /* $html = \PDF::loadView('print_leader');
        $pdf = app('dompdf.wrapper');
        $pdf -> loadHTML($html);
        return $pdf->stream('lideres.pdf');*/
    }
}
