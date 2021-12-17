<?php

namespace App\Http\Livewire\Socios;

use App\Models\Comunidad;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Persona;
use App\Models\Provincia;
use App\Models\Socio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;

    public $departamentos;
    public $provincias;
    public $distritos;
    public $comunidades;
    public $personas;

    public $selectedDepartamento = NULL;
    public $selectedProvincia = NULL;
    public $selectedDistrito = NULL;
    public $selectedComunidad = NULL;

    protected $rules = [
        'selectedDepartamento' => 'required',
        'selectedProvincia' => 'required',
        'selectedDistrito' => 'required',
        'selectedComunidad' => 'required',
    ];

    public function mount()
    {   
        $this->personas = Persona::all();
        $this->departamentos = Departamento::all();
        $this->provincias = collect();
        $this->distritos = collect();
        $this->comunidades = collect();
    }

    public function render()
    {
        $personas = $this->personas;
        $departamentos = $this->departamentos;
        return view('livewire.socios.create', compact(['departamentos' => compact($this->departamentos), 
        'personas' => $personas]));
    }

    public function updatedselectedDistrito($distrito)
    {
        
        if (!is_null($distrito)) {
            $this->comunidades = Comunidad::where('FK_ID_distrito', $distrito)->get();
        }
    }

    public function updatedselectedDepartamento($departamento)
    {
        $this->provincias = collect();
        $this->distritos = collect();
        $this->comunidades = collect();
        if (!is_null($departamento)) {
            $this->provincias = Provincia::where('FK_ID_departamento', $departamento)->get();
        }
    }

    public function updatedselectedProvincia($provincia)
    {
        $this->distritos = collect();
        $this->comunidades = collect();
        if (!is_null($provincia)) {
            $this->distritos = Distrito::where('FK_ID_provincia', $provincia)->get();
        }
    }

    public function create() {

        $this->validate();

        Socio::create([
            'ES_SOCIO' => '1',
            'FK_ID_comunidad' => $this->selectedComunidad,
            'PK_ID_socio' => $this->persona->PK_ID_persona
        ]);

        $this->flash('success','¡Se registró!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se registró correctamente al socio',
        ], '/socios');
    }

    public function updated($props) {
        $this->validateOnly($props);
    }
}
