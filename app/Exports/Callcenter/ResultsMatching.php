<?php

namespace App\Exports\Callcenter;

use App\Models\ConfirmationResult;
use App\Models\Encuesta;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class ResultsMatching implements FromView,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $coincidencia = Encuesta::where('status_number','1')
            ->join('sympathizers', function ($join) {
            $join->on('encuestas.clave_elector', '=', 'sympathizers.clave_elector')
            ->whereIn('sympathizers.user_id',[3,4])
            ->where('encuestas.q5','opcion1');
        })->get();
        $tocados  = ConfirmationResult::with(['getTocado'])->Confirmed()->get();
        return view('reportes.excel.simpatizantes.encuestas.results_matching');
    }

    public function title(): string
    {
        return 'Coincidencia de Resultados';
    }
}
