<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "tbl_asistencia";

    protected $primaryKey = 'PK_ID_con_event';

    public $incrementing = true;

    protected $guarded = ['PK_ID_con_event'];

    public function evento() {
        return $this->belongsTo('App\Models\Evento', 'FK_ID_evento', 'PK_ID_evento');
    }

    public function socio() {
        return $this->belongsTo('App\Models\Socio', 'FK_ID_socio', 'PK_ID_socio');
    }
}
