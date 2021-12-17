<?php

namespace App\Exports;

use App\Models\Socio;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SocioExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View {
        return view('sistema.socio.exportar.excel', [
            'socios' => Socio::get()
        ]);
    }
}