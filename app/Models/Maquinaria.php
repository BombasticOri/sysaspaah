<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    use HasFactory;

    protected $table = "mae_maquinaria";

    protected $primaryKey = 'PK_ID_maquinaria';

    public $incrementing = true;

    protected $guarded = ['PK_ID_maquinaria'];

    public function solicitudmaquinarias() {
        return $this->hasMany('App\Models\SolicitudMaquinaria', 'FK_ID_maquinaria', 'PK_ID_sol_maquinaria');
    }
}
