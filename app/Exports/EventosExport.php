<?php

namespace App\Exports;

use App\Models\Evento;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class EventosExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View {
        return view('sistema.evento.exportar.excel', [
            'eventos' => Evento::get()
        ]);
    }
}