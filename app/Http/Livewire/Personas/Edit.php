<?php

namespace App\Http\Livewire\Personas;

use App\Models\Persona;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    
    public $persona;

    public $PK_ID_persona, $NO_persona, $AP_paterno_persona, $AP_materno_persona, $TI_sexo, 
            $NU_dni, $NU_celular, $DI_persona, $IM_persona;

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

    protected $listeners = [
        'update'
    ];

    public function mount($id)
    {
        $persona = Persona::where('PK_ID_persona', $id)->first();

        $this->PK_ID_persona = $id;
        $this->NO_persona = $persona->NO_persona;
        $this->AP_paterno_persona = $persona->AP_paterno_persona;
        $this->AP_materno_persona = $persona->AP_materno_persona;
        $this->TI_SEXO = $persona->TI_SEXO;
        $this->NU_dni = $persona->NU_dni;
        $this->NU_celular = $persona->NU_celular;
        $this->DI_persona = $persona->DI_persona;
        $this->IM_persona = $persona->IM_persona;
    }

    public function render()
    {
        return view('livewire.personas.edit');
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

        $persona = Persona::find($this->PK_ID_persona);

        $persona->update([
            'NO_persona' => $this->NO_persona,
            'AP_paterno_persona' => $this->AP_paterno_persona,
            'AP_materno_persona' => $this->AP_materno_persona,
            'TI_SEXO' => $this->TI_SEXO,
            'NU_dni' => $this->NU_dni,
            'NU_celular' => $this->NU_celular,
            'DI_persona' => $this->DI_persona,
            'IM_persona' => $this->IM_persona
        ]);

        $this->flash('success','¡Se actualizó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se actualizó correctamente la persona',
        ], '/personas');
    }
}
