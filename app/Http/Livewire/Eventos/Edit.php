<?php

namespace App\Http\Livewire\Eventos;

use App\Models\Evento;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    
    public $eventos;

    public $PK_ID_eventos, $NO_eventos, $NO_lugar, $FE_inicio, $FE_fin, $DE_eventos;

    protected $rules = [
        'NO_eventos' => 'required',
        'NO_lugar' => 'required',
        'FE_inicio' => 'required',
        'FE_fin' => 'required',
        'DE_eventos' => 'required',
    ];

    protected $listeners = [
        'update'
    ];

    public function mount($id)
    {
        $eventos = Evento::where('PK_ID_eventos', $id)->first();

        $this->PK_ID_eventos = $id;
        $this->NO_eventos = $eventos->NO_eventos;
        $this->NO_lugar = $eventos->NO_lugar;
        $this->FE_inicio = $eventos->FE_inicio;
        $this->FE_fin = $eventos->FE_fin;
        $this->DE_eventos = $eventos->DE_eventos;
    }

    public function render()
    {
        return view('livewire.eventos.edit');
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

        $eventos = Evento::find($this->PK_ID_eventos);

        $eventos->update([
            'NO_eventos' => $this->NO_eventos,
            'NO_lugar' => $this->NO_lugar,
            'FE_inicio' => $this->FE_inicio,
            'FE_fin' => $this->FE_fin,
            'DE_eventos' => $this->DE_eventos
        ]);

        $this->flash('success','¡Se actualizó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Evento actualizado con exito',
        ], '/eventos');
    }
}
