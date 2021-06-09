<?php

namespace App\Exports;

use App\Models\Mobilizer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class Leader_userExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function view(): View
    {
        return view('reportes.leader_user', [
            'movilizadores' => Mobilizer::with('getInfo')->where('user_id',4)->get(),
            //'tocados' => Tocados::select('mobilizer_id','tocado_id')->with(['getInfo','movilizadores'])->get()
        ]);
    }
}
