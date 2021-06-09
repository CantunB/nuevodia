<?php

namespace App\Exports;

use App\Models\Leader;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class SympathizerGeneralExport implements FromView, WithTitle
{
    use Exportable;

    public function view(): View
    {
        return view('reportes.general_excel', [
            'lideres' => Leader::all(),
            //'tocados' => Tocados::select('mobilizer_id','tocado_id')->with(['getInfo','movilizadores'])->get()
        ]);
    }

    public function title(): string
    {
        return 'Simpatizantes';
    }
}
