<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = "tbl_rol";

    protected $primary_key = 'PK_ID_usuario';

    public $incrementing = true;

    protected $guarded = ['PK_ID_usuario'];

    public function rolprivilegios() {
        return $this->hasMany('App\Models\RolPrivilegio', 'FK_ID_rol', 'PK_ID_rol_privilegio');
    }

    public function usuariorols() {
        return $this->hasMany('App\Models\UsuarioRol', 'FK_ID_rol', 'PK_ID_user_rol');
    }
}
