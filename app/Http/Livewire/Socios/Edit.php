<?php

namespace App\Http\Livewire\Solicitud;

use App\Models\Persona;
use App\Models\Socio;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    
    public $socios;

    public $PK_ID_socio;

    protected $rules = [
        'DE_observaciones' => 'required',
        'FK_ID_comunidad' => 'required',
    ];

    protected $listeners = [
        'update'
    ];

    public function mount($id)
    {
        $socios = Socio::where('PK_ID_socio', $id)->first();

        $this->DE_observaciones = $socios->DE_observaciones;
        $this->FK_ID_comunidad = $socios->FK_ID_comunidad;
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

        $socios= Socio::find($this->PK_ID_socio);

        $socios->update([
            'ES_solicitud' => $this->ES_solicitud,
            'FK_ID_persona' => $this->FK_ID_persona,
        ]);

        $this->flash('success','¡Se actualizó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se actualizó correctamente al socio',
        ], '/socios');
    }
}
