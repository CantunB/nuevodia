<?php

namespace App\Http\Controllers\Reports\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tocados;
use App\Models\Sympathizer;

class TocadosController extends Controller
{
    public function tocados_complet(Request $request, $mobilizer)
    {   
        $mov = Sympathizer::findOrFail($mobilizer);
        $mov = $mov->nombre .' '. $mov->paterno .' '. $mov->materno;
        $tocados  = Tocados::with(['getInfo','movilizadores'])->where('mobilizer_id',$mobilizer)->get();
        $pdf = \PDF::loadView('reportes.pdf.tocados_complet',compact('tocados','mov'))->setPaper('a4', 'landscape');
        return $pdf->stream($mov.'pdf');
    }
}
