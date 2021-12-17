<?php

namespace App\Http\Livewire\Eventos;

use App\Models\Evento;
use Illuminate\Console\Scheduling\EventMutex;
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

    public $palabraBuscar, $tipoBuscar = 0, $eventos;

    public $PK_ID_eventos, $NO_eventos, $NO_lugar, $FE_inicio, $FE_fin, $DE_eventos;

    public function render()
    {
        if ($this->tipoBuscar == '0') {
            $this->eventos = Evento::where('PK_ID_eventos', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('PK_ID_eventos', 'desc')->paginate(10); 
        } else {
            $this->eventos = Evento::where('NO_eventos', 'like', '%' . $this->palabraBuscar . '%')
            ->orWhere('NO_lugar', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('NO_eventos', 'desc')->paginate(10); 
        }
        $links = $this->eventos;
        $this->eventos = collect($this->eventos->items());

        return view('livewire.eventos.index', ['eventos' => compact($this->eventos), 
        'links' => $links]);
    }

    public function delete($id)
    {
        $this->PK_ID_eventos = $id;
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
        if ($this->PK_ID_eventos) {
            $eventos = Evento::where('PK_ID_eventos', $this->PK_ID_eventos);
            $eventos->delete();
        }

        $this->alert('success','¡Se eliminó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se eliminó correctamente el evento',
        ], '/eventos');
    }
/* 
    public function saveRequisito() {
        $this->reqTBL = DB::select("call SP_INS_REQUISITOS('$this->palabraReq', @status)");
    } */
}
