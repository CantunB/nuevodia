<?php

namespace App\Http\Controllers\Reports\excel;

use App\Exports\GeneralExport;
use App\Exports\FinalExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SympathizersController extends Controller
{
    public function export_general(GeneralExport  $simpatizantes)
    {
        return $simpatizantes->download('ReporteGeneral.xlsx');
    }

    public function export_final(FinalExport $simpatizante)
    {
        return $simpatizante->download('Simpatizantes.xlsx');
    }
}
