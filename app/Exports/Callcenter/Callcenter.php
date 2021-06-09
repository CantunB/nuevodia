<?php

namespace App\Exports\Callcenter;

use App\Encuesta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\Callcenter\Confirmados;
use Maatwebsite\Excel\Concerns\Exportable;

class Callcenter implements WithMultipleSheets
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct()
    {

    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function sheets(): array
    {
        $sheets = [];
        // Agregas las hojas
        array_push($sheets, new Confirmados());
        array_push($sheets, new PollsAll());
        array_push($sheets, new ResultsMatching());

        //array_push($sheets, new ReporteUbicacionesSheet());
        return $sheets;
    }
}
