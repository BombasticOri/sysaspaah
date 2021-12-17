<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = "tbl_contrato";

    protected $primaryKey = 'PK_ID_contrato';

    public $incrementing = true;

    protected $guarded = ['PK_ID_contrato'];

    public function solicitudmaquinaria() {
        return $this->belongsTo('App\Models\SolicitudMaquinaria', 'FK_ID_sol_maquinaria', 'PK_ID_sol_maquinaria');
    }

    public function maquinaria() {
        return $this->belongsTo('App\Models\Maquinaria', 'FK_ID_maquinaria', 'PK_ID_maquinaria');
    }

    public function operario() {
        return $this->belongsTo('App\Models\Operario', 'FK_ID_operario', 'PK_ID_operario');
    }
}
