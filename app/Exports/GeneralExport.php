<?php

namespace App\Exports;

use App\Exports\Users\GriseldaReportExport;
use App\Exports\Users\HeydiReportExport;
use App\Exports\Users\IlianaReportExport;
use App\Exports\Users\MonserrathReportExport;
use App\Exports\Users\RubyReportExport;
use App\Exports\Users\SayraReportExport;
use App\Exports\Users\UsersReportExport;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GeneralExport implements WithMultipleSheets
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct()
    {

    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        // Agregas las hojas
        array_push($sheets, new SympathizerGeneralExport());
        array_push($sheets, new UsersReportExport());
        array_push($sheets, new GriseldaReportExport());
        array_push($sheets, new HeydiReportExport());
        array_push($sheets, new IlianaReportExport());
        array_push($sheets, new MonserrathReportExport());
        array_push($sheets, new RubyReportExport());
        array_push($sheets, new SayraReportExport());
        //array_push($sheets, new ReporteUbicacionesSheet());
        return $sheets;
    }
}
