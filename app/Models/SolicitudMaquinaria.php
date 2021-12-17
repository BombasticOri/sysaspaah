<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudMaquinaria extends Model
{
    use HasFactory;

    protected $table = "tbl_solicitud_maquinaria";

    protected $primaryKey = 'PK_ID_sol_maquinaria';

    public $incrementing = true;

    protected $guarded = ['PK_ID_sol_maquinaria'];

    public function socio() {
        return $this->belongsTo('App\Models\Socio', 'FK_ID_socio', 'PK_ID_socio');
    }

    public function maquinaria() {
        return $this->belongsTo('App\Models\Maquinaria', 'FK_ID_maquinaria', 'PK_ID_maquinaria');
    }
}
