<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;

    protected $table = "tbl_socio";

    protected $primaryKey = 'PK_ID_socio';

    public $incrementing = true;

    protected $guarded = ['PK_ID_socio'];

    public function comunidad() {
        return $this->belongsTo('App\Models\Comunidad', 'FK_ID_comunidad', 'PK_ID_comunidad');
    }

    public function persona() {
        return $this->belongsTo('App\Models\Persona', 'PK_ID_socio', 'PK_ID_persona');
    }
}
