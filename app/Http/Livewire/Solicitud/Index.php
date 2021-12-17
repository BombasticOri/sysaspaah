<?php

namespace App\Http\Livewire\Solicitud;

use App\Models\SolicitudSocio;
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

    public $palabraBuscar, $tipoBuscar = 5, $solicitudes;

    public $PK_ID_sol_socio, $NO_solicitante, $AP_paterno_solicitante, $AP_materno_solicitante, $ES_solicitud,
            $FE_creado, $FK_ID_persona;

    public function render()
    {
        if ($this->tipoBuscar == '0') {
            $this->solicitudes = SolicitudSocio::where('NO_solicitante', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('NO_solicitante', 'desc')->paginate(10); 
        } else if ($this->tipoBuscar == '1') {
            $this->solicitudes = SolicitudSocio::where('NO_solicitante', 'like', '%' . $this->palabraBuscar . '%')
            ->orWhere('AP_paterno_solicitante', 'like', '%' . $this->palabraBuscar . '%')
            ->orWhere('AP_materno_solicitante', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('NO_solicitante', 'desc')->paginate(10); 
        } else if ($this->tipoBuscar == '2') {
            $this->solicitudes = SolicitudSocio::where('NO_solicitante', 'like', '%' . $this->palabraBuscar . '%')
            ->where('ES_solicitud', '=', 0)
            ->orderBy('NO_solicitante', 'desc')->paginate(10); 
        }  else if ($this->tipoBuscar == '3') {
            $this->solicitudes = SolicitudSocio::where('NO_solicitante', 'like', '%' . $this->palabraBuscar . '%')
            ->where('ES_solicitud', '=', 1)
            ->orderBy('NO_solicitante', 'desc')->paginate(10); 
        } else if ($this->tipoBuscar == '4') {
            $this->solicitudes = SolicitudSocio::where('NO_solicitante', 'like', '%' . $this->palabraBuscar . '%')
            ->where('ES_solicitud', '=', 2)
            ->orderBy('NO_solicitante', 'desc')->paginate(10); 
        }
          else{
            $this->solicitudes = SolicitudSocio::where('PK_ID_sol_socio', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('PK_ID_sol_socio', 'desc')->paginate(10); 
        }

        $links = $this->solicitudes;
        $this->solicitudes = collect($this->solicitudes->items());

        return view('livewire.solicitud.index', ['solicitudes' => compact($this->solicitudes), 
        'links' => $links]);
    }

    public function delete($id)
    {
        $this->PK_ID_sol_socio = $id;
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
        if ($this->PK_ID_sol_socio) {
            $solicitudes = SolicitudSocio::where('PK_ID_sol_socio', $this->PK_ID_sol_socio);
            $solicitudes->delete();
        }

        $this->alert('success','¡Se eliminó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se eliminó correctamente la solicitud',
        ], '/solicitudsocios');
    }
/* 
    public function saveRequisito() {
        $this->reqTBL = DB::select("call SP_INS_REQUISITOS('$this->palabraReq', @status)");
    } */
}
