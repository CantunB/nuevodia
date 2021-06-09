<?php

namespace App\Exports\Users;

use App\Models\Leader;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class SayraReportExport implements FromView, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('reportes.excel.users.individual', [
            'usuario' =>Leader::with('getUser')->where('user_id','6')->first(),
            'datos' => Leader::where('user_id','6')->get()
        ]);
    }


    public function title(): string
    {
        return 'Sayra';
    }
}
