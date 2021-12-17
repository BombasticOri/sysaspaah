<?php

namespace App\Http\Livewire\Solicitud;

use App\Models\Persona;
use App\Models\SolicitudSocio;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    
    public $solicitud;

    public $PK_ID_sol_socio, $NO_solicitante, $AP_paterno_solicitante, $AP_materno_solicitante, $ES_solicitud,
            $FE_creado, $FK_ID_persona,$personas;

    protected $rules = [
        'NO_solicitante' => 'required',
        'AP_paterno_solicitante' => 'required',
        'AP_materno_solicitante' => 'required',
        'ES_solicitud' => 'required|in:0, 1, 2',
        'FE_creado' => 'required',
    ];

    protected $listeners = [
        'update'
    ];

    public function mount($id)
    {
        $solicitud = SolicitudSocio::where('PK_ID_sol_socio', $id)->first();

        $this->PK_ID_sol_socio = $id;
        $this->NO_solicitante = $solicitud->NO_solicitante;
        $this->AP_paterno_solicitante = $solicitud->AP_paterno_solicitante ;
        $this->AP_materno_solicitante = $solicitud->AP_materno_solicitante ;
        $this->ES_solicitud = $solicitud->ES_solicitud;
        $this->FE_creado = $solicitud->FE_creado;
        $this->FK_ID_persona = $solicitud->FK_ID_persona;
    }

    public function render()
    {
        $this->personas = Persona::all();
        return view('livewire.solicitud.edit');
    }

    public function edit() {
        $this->alert('warning', '¿Desea actualizar?', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'update',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonColor' => '#d33',
            'text' => 'Los datos nuevos, remplazarán los datos antiguos',
            'confirmButtonColor' => '#3085d6'
        ]);
    }

    public function updated($props) {
        $this->validateOnly($props);
    }

    public function update() {
        $this->validate();

        $solicitud = SolicitudSocio::find($this->PK_ID_sol_socio);

        $solicitud->update([
            'NO_solicitante' => $this->NO_solicitante,
            'AP_paterno_solicitante' => $this->AP_paterno_solicitante,
            'AP_materno_solicitante' => $this->AP_materno_solicitante,
            'ES_solicitud' => $this->ES_solicitud,
            'FE_creado' => $this->FE_creado,
            'FK_ID_persona' => $this->FK_ID_persona
        ]);

        $this->flash('success','¡Se actualizó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se actualizó correctamente la persona',
        ], '/solicitudsocios');
    }
}
