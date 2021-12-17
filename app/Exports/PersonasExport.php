<?php

namespace App\Exports;

use App\Models\Persona;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PersonasExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View {
        return view('sistema.persona.exportar.excel', [
            'personas' => Persona::get()
        ]);
    }
}
