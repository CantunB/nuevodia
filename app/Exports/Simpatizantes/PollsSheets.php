<?php

namespace App\Exports\Simpatizantes;

use App\Models\Sympathizer;
use App\Models\Tocados;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class PollsSheets implements FromView, WithTitle
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
        $mov = Sympathizer::findOrFail($this->mobilizer);
        $mov = $mov->nombre .' '. $mov->paterno .' '. $mov->materno;
        $tocados  = Tocados::with(['getInfo','movilizadores'])->where('mobilizer_id',$this->mobilizer)->get();
        return view('reportes.excel.simpatizantes.encuestas.encuestas', compact('tocados','mov'));
    }

    public function title(): string
    {
        return 'Encuestas ' . $this->name;
    }
}
