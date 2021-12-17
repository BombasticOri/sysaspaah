<?php

namespace App\Http\Livewire\Eventos;

use App\Models\Evento;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    protected $rules = [
        'NO_eventos' => 'required',
        'NO_lugar' => 'required',
        'FE_inicio' => 'required',
        'FE_fin' => 'required',
        'DE_eventos' => 'required',
    ];

    public $PK_ID_eventos, $NO_eventos, $NO_lugar, $FE_inicio, $FE_fin, $DE_eventos;

    public function render()
    {
        return view('livewire.eventos.create');
    }

    public function create() {

        $this->validate();

        Evento::create([
            'NO_eventos' => $this->NO_eventos,
            'NO_lugar' => $this->NO_lugar,
            'FE_inicio' => $this->FE_inicio,
            'FE_fin' => $this->FE_fin,
            'DE_eventos' => $this->DE_eventos
        ]) ;

        $this->flash('success','¡Se registró!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Evento registrado con exito',
        ], '/eventos');
    }

    public function updated($props) {
        $this->validateOnly($props);
    }
}
