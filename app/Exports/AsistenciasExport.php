<?php

namespace App\Exports;

use App\Models\Asistencia;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class AsistenciaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View {
        return view('sistema.asistencia.exportar.excel', [
            'asistencias' => Asistencia::get()
        ]);
    }
}