<?php

namespace App\Exports\Callcenter;

use App\Models\Encuesta;
use App\Models\Sympathizer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class Confirmados implements FromView, WithTitle
{
     /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {

        //$confirmados = Sympathizer::Suemy()->whereNotNull('celular')->get();
        $confirmados = Encuesta::
            join('sympathizers', function ($join) {
            $join->on('encuestas.clave_elector', '=', 'sympathizers.clave_elector')
            ->whereNotNull('sympathizers.celular')
            ->whereIn('sympathizers.user_id',[6,7,9,10]);
            //->whereIn('sympathizers.user_id',[6,7,9,10]);

        })->get();
        return view('reportes.excel.callcenter.confirmados',compact('confirmados'));
    }

    public function title(): string
    {
        return 'Confirmados CallCenter';
    }
}
