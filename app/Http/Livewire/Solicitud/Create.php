<?php

namespace App\Http\Livewire\Solicitud;

use App\Models\Persona;
use App\Models\SolicitudSocio;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    protected $rules = [
        'NO_solicitante' => 'required',
        'AP_paterno_solicitante' => 'required',
        'AP_materno_solicitante' => 'required',
        'ES_solicitud' => 'required|in:0, 1, 2',
        'FE_creado' => 'required',
    ];

    public $PK_ID_sol_socio, $NO_solicitante, $AP_paterno_solicitante, $AP_materno_solicitante, $ES_solicitud,
            $FE_creado, $FK_ID_persona,$personas;
    
    public function render()
    {
        $this->personas = Persona::all();
        return view('livewire.solicitud.create');
    }

    public function create() {

        $this->validate();

        SolicitudSocio::create([
            'PK_ID_sol_socio' => $this->PK_ID_sol_socio,
            'NO_solicitante' => $this->NO_solicitante,
            'AP_paterno_solicitante' => $this->AP_paterno_solicitante,
            'AP_materno_solicitante' => $this->AP_materno_solicitante,
            'ES_solicitud' => $this->ES_solicitud,
            'FE_creado' => $this->FE_creado,
            'FK_ID_persona' => $this->FK_ID_persona
        ]) ;

        $this->flash('success','¡Se registró!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se registró correctamente a la persona',
        ], '/solicitudsocios');
    }

    public function updated($props) {
        $this->validateOnly($props);
    }
}
