<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = "tbl_usuarios";

    protected $primary_key = 'PK_ID_usuario';

    public $incrementing = true;

    protected $guarded = ['PK_ID_usuario'];

    public function persona() {
        return $this->belongsTo('App\Models\Persona','PK_ID_persona','PK_ID_usuario');
    }

    public function usuariorols() {
        return $this->hasMany('App\Models\UsuarioRol', 'FK_ID_usuario', 'PK_ID_user_rol');
    }
}
