<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $table = "mae_eventos";

    protected $primaryKey = 'PK_ID_eventos';

    public $incrementing = true;

    protected $guarded = ['PK_ID_eventos'];

    public function asistencias() {
        return $this->hasMany('App\Models\Asistencia', 'FK_ID_eventos', 'PK_ID_con_event');
    }
}
