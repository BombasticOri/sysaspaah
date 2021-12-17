<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operario extends Model
{
    use HasFactory;

    protected $table = "tbl_operario";

    protected $primaryKey = 'PK_ID_operario';

    public $incrementing = true;

    protected $guarded = ['PK_ID_operario'];

    public function persona() {
        return $this->belongsTo('App\Models\Persona', 'PK_ID_operario', 'PK_ID_persona');
    }

    public function maquinaria() {
        return $this->belongsTo('App\Models\Maquinaria', 'FK_ID_maquinaria', 'PK_ID_maquinaria');
    }

    public function contratos() {
        return $this->hasMany('App\Models\Contrato', 'FK_ID_operario', 'PK_ID_operario');
    }
}
