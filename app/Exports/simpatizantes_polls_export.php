<?php

namespace App\Exports;

use App\Exports\Simpatizantes\PollsConfirmationSheets;
use App\Exports\Simpatizantes\PollsSheets;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class simpatizantes_polls_export implements WithMultipleSheets
{
    use Exportable;
    protected $mobilizer;
    protected $name;


    public function __construct(int $movilizador, string $name)
    {
        $this->mobilizer = $movilizador;
        $this->name = $name;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function sheets(): array
    {
        $sheets = [];
        array_push($sheets, new PollsSheets($this->mobilizer, $this->name));
        array_push($sheets, new PollsConfirmationSheets($this->mobilizer, $this->name));
        return $sheets;
    }
}
