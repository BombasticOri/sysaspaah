<?php

namespace App\Http\Livewire\Personas;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Persona;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    protected $rules = [
        'NO_persona' => 'required',
        'AP_paterno_persona' => 'required',
        'AP_materno_persona' => 'required',
        'TI_sexo' => 'required|in:1, 2',
        'NU_dni' => 'required|max:8',
        'NU_celular' => 'required|max:9',
        'DI_persona' =>'required',
        'IM_persona' => 'required'
    ];

    public $PK_ID_persona, $NO_persona, $AP_paterno_persona, $AP_materno_persona, $TI_sexo, 
            $NU_dni, $NU_celular, $DI_persona, $IM_persona;
    
    public function render()
    {
        return view('livewire.personas.create');
    }

    public function create() {

        $this->validate();

        Persona::create([
            'PK_ID_persona' => $this->PK_ID_persona,
            'NO_persona' => $this->NO_persona,
            'AP_paterno_persona' => $this->AP_paterno_persona,
            'AP_materno_persona' => $this->AP_materno_persona,
            'TI_sexo' => $this->TI_sexo,
            'NU_dni' => $this->NU_dni,
            'NU_celular' => $this->NU_celular,
            'DI_persona' => $this->DI_persona,
            'IM_persona' => $this->IM_persona
        ]) ;

        $this->flash('success','¡Se registró!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se registró correctamente a la persona',
        ], '/personas');
    }

    public function updated($props) {
        $this->validateOnly($props);
    }
}
