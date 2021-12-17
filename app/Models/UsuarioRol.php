<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioRol extends Model
{
    use HasFactory;

    protected $table = "tbl_user_rol";

    protected $primaryKey = 'PK_ID_user_rol';

    public $incrementing = true;

    protected $guarded = ['PK_ID_user_rol'];

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario', 'FK_ID_usuario', 'PK_ID_usuario');
    }

    public function rol() {
        return $this->belongsTo('App\Models\Persona', 'FK_ID_rol', 'PK_ID_rol');
    }
}
