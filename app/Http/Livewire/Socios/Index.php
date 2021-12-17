<?php

namespace App\Http\Livewire\Socios;

use App\Models\Socio;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $listeners = [
        'crearIns',
    ];

    protected $paginationTheme = 'bootstrap';

    public $palabraBuscar, $tipoBuscar = 1, $socios;
    public function render()
    {
        if ($this->tipoBuscar == '0') {
            $this->socios = Socio::join("MAE_comunidad", "TBL_socios.FK_ID_comunidad", "=", "MAE_comunidad.PK_ID_comunidad")
            ->join("MAE_persona", "TBL_socio.PK_ID_socio", "=", "MAE_persona.PK_ID_persona")
            ->where("MAE_persona.NO_persona", "like", '%'.$this->palabraBuscar.'%')
            ->where("TBL_socio.ES_socio", "=", '1')
            ->select("TBL_socio.*")
            ->orderBy('MAE_comunidad.NO_comunidad', 'desc')->paginate(10);
        } else if($this->tipoBuscar == '1') {
            $this->socios = Socio::join("MAE_comunidad", "TBL_socio.FK_ID_comunidad", "=", "MAE_comunidad.PK_ID_comunidad")
            ->join("MAE_persona", "TBL_socio.PK_ID_socio", "=", "MAE_persona.PK_ID_persona")
            ->where("MAE_comunidad.NO_comunidad", "like", '%'.$this->palabraBuscar.'%')
            ->where("TBL_socio.ES_socio", "=", '1')
            ->select("MAE_SOCIOS.*")
            ->orderBy('MAE_comunidad.NO_comunidad', 'desc')->paginate(10);
        } else {
            $this->socios = Socio::join("MAE_comunidad", "TBL_socio.FK_ID_comunidad", "=", "MAE_comunidad.PK_ID_comunidad")
            ->join("MAE_persona", "TBL_socio.PK_ID_socio", "=", "MAE_persona.PK_ID_persona")
            ->where("MAE_persona.NO_persona", "like", '%'.$this->palabraBuscar.'%')
            ->where("TBL_socio.ES_socio", "=", '1')
            ->select("TBL_socio.*")
            ->orderBy('MAE_comunidad.NO_comunidad', 'desc')->paginate(10);
        }

        $links = $this->socios;
        $this->socios = collect($this->socios->items());

        return view('livewire.socios.index', ['socios' => compact($this->socios), 
        'links' => $links]);
    }

    public function delete($id)
    {
        $this->PK_ID_socio = $id;
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
        if ($this->PK_ID_socio) {
            $socios = Socio::where('PK_ID_socio', $this->PK_ID_socio);
            $socios->delete();
        }

        $this->alert('success','¡Se eliminó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se eliminó correctamente el socio',
        ], '/socios');
    }
/* 
    public function saveRequisito() {
        $this->reqTBL = DB::select("call SP_INS_REQUISITOS('$this->palabraReq', @status)");
    } */
}
