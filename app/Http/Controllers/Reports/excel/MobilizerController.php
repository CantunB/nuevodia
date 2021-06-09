<?php

namespace App\Http\Controllers\Reports\excel;

use App\Exports\simpatizantes_polls_export;
use App\Http\Controllers\Controller;
use App\Models\Mobilizer;
use App\Models\Sympathizer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MobilizerController extends Controller
{
    public function confirmacion_resultados($movilizador)
    {
        $m = Sympathizer::findOrFail($movilizador);
        $name = $m->nombre .' '. $m->paterno .' '. $m->materno;
        //return $polls->download('Confirmados'.$name.'.xlsx');
       // return (new simpatizantes_polls_export($movilizador))->download('Confirmados.xlsx');
        return Excel::download(new simpatizantes_polls_export($movilizador, $name), 'Confirmacion Resultados '.$name.'.xlsx');
    }
}
