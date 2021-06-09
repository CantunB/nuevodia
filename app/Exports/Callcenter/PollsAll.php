<?php

namespace App\Exports\Callcenter;

use App\Models\ConfirmationResult;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class PollsAll implements FromView, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        $tocados  = ConfirmationResult::with(['getTocado'])
        ->whereHas('getTocado', function($q) {
            $q->whereNotNull('celular');
        })
        ->Confirmed()
        ->get();
        return view('reportes.excel.simpatizantes.encuestas.encuestas_all', compact('tocados'));
    }

    public function title(): string
    {
        return 'Confirmacion de Resultados';
    }
}
