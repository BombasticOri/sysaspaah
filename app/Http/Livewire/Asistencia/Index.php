<?php

namespace App\Http\Livewire\Asistencia;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $listeners = [
        'destroy'
    ];

    protected $paginationTheme = 'bootstrap';

    public $palabraBuscar, $tipoBuscar = 5, $asistencia;

    public $PK_id_con_event, $FK_ID_eventos, $FK_ID_socio;

    public function render()
    {
        return view('livewire.asistencia.index');
    }
}
