<?php

namespace App\Http\Livewire\Personas;

use App\Models\Persona;
use Illuminate\Support\Facades\DB;
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

    public $palabraBuscar, $tipoBuscar = 3, $personas;

    public $PK_ID_persona, $NO_persona, $AP_paterno_persona, $AP_materno_persona, $TI_sexo, 
            $NU_dni, $NU_celular, $DI_persona, $IM_persona;

    public function render()
    {
        if ($this->tipoBuscar == '0') {
            $this->personas = Persona::where('NO_persona', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('NO_persona', 'desc')->paginate(10); 
        } else if ($this->tipoBuscar == '1') {
            $this->personas = Persona::where('NO_persona', 'like', '%' . $this->palabraBuscar . '%')
            ->orWhere('AP_paterno_persona', 'like', '%' . $this->palabraBuscar . '%')
            ->orWhere('AP_materno_persona', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('NO_persona', 'desc')->paginate(10); 
        } else if($this->tipoBuscar == '2') {
            $this->personas = Persona::where('NU_dni', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('NU_dni', 'desc')->paginate(10); 
        } else{
            $this->personas = Persona::where('PK_ID_persona', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('PK_ID_persona', 'desc')->paginate(10); 
        }

        $links = $this->personas;
        $this->personas = collect($this->personas->items());

        return view('livewire.personas.index', ['personas' => compact($this->personas), 
        'links' => $links]);
    }

    public function delete($id)
    {
        $this->PK_ID_persona = $id;
        $this->alert('question', '¿Desea eliminar?', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'destroy',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonColor' => '#d33',
            'text' => 'Los datos se eliminarán por completo',
            'confirmButtonColor' => '#3085d6'
        ]);
    }

    public function destroy() {
        if ($this->PK_ID_persona) {
            $personas = Persona::where('PK_ID_persona', $this->PK_ID_persona);
            $personas->delete();
        }

        $this->alert('success','¡Se eliminó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se eliminó correctamente la persona',
        ], '/personas');
    }
/* 
    public function saveRequisito() {
        $this->reqTBL = DB::select("call SP_INS_REQUISITOS('$this->palabraReq', @status)");
    } */
}
