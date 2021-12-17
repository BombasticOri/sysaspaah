<?php

namespace App\Exports;

use App\Models\SolicitudSocio;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SolicitudesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View {
        return view('sistema.solicitudsocio.exportar.excel', [
            'solicitudes' => SolicitudSocio::get()
        ]);
    }
}