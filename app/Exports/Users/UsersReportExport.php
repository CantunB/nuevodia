<?php

namespace App\Exports\Users;

use App\Models\Leader;
use App\Models\Sympathizer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class UsersReportExport implements FromView, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('reportes.excel.gestiones_gral', [
            'lideres' => Leader::groupBy('user_id')->get()
        ]);
    }

    public function title(): string
    {
        return 'General';
    }
}
