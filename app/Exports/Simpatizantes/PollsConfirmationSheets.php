<?php

namespace App\Exports\Simpatizantes;

use App\Models\ConfirmationResult;
use App\Models\Sympathizer;
use App\Models\Tocados;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class PollsConfirmationSheets implements FromView, WithTitle
{
    private $mobilizer;
    private $name;
    public function __construct(int $mobilizer, string $name)
    {
        $this->mobilizer = $mobilizer;
        $this->name = $name;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        //$mov = Sympathizer::findOrFail($this->mobilizer);
        //$tocados  = ConfirmationResult::with(['getInfo','getTocado'])->where('mobilizer_id',$this->mobilizer)->Confirmed()->get();
        $tocados  = Tocados::with(['getInfo','movilizadores'])->where('mobilizer_id',$this->mobilizer)->get();

        //$pdf = \PDF::loadView('reportes.pdf.tocados_complet',compact('tocados','mov'))->setPaper('a4', 'landscape');
        //return $pdf->stream($mov.'pdf');
        return view('reportes.excel.simpatizantes.encuestas.encuestas_confirmacion', compact('tocados'));
    }

    public function title(): string
    {
        return 'Confirmacion de Resultados de '. $this->name;
    }
}
