<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudSocio extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "tbl_solicitud_socio";

    protected $primaryKey = 'PK_ID_sol_socio';

    public $incrementing = true;

    protected $guarded = ['PK_ID_sol_socio'];

    public function persona() {
        return $this->belongsTo('App\Models\Persona','FK_ID_persona','PK_ID_persona');
    }
}
