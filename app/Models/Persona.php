<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    protected $table = "mae_persona";

    protected $primaryKey = 'PK_ID_persona';

    public $incrementing = true;

    protected $guarded = ['PK_ID_persona'];

    public function socio() {
        return $this->hasOne('App\Models\Socio', 'PK_ID_socio', 'PK_ID_socio');
    }

    public function usuario() {
        return $this->hasOne('App\Models\Usuario', 'PK_ID_usuario', 'PK_ID_usuario');
    }
}
