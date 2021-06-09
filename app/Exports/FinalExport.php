<?php

namespace App\Exports;

use App\Models\Leader;
use App\Models\Sympathizer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class FinalExport implements FromView
{
    use Exportable;
    public function view(): View
    {
        //$simpatizantes = Sympathizer::Suemy()->get();
        $lideres = Leader::all();
        return view('reportes.excel.simpatizantes.simpatizantes', compact('lideres'));
    }
}
