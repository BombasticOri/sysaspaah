<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolPrivilegio extends Model
{
    use HasFactory;

    protected $table = "tbl_rol_priv";

    protected $primaryKey = 'PK_ID_rol_privilegio';

    public $incrementing = true;

    protected $guarded = ['PK_ID_rol_privilegio'];

    public function rol() {
        return $this->belongsTo('App\Models\Rol', 'FK_ID_rol', 'PK_ID_rol');
    }

    public function privilegio() {
        return $this->belongsTo('App\Models\Privilegio', 'FK_ID_privilegio', 'PK_ID_privilegio');
    }
}
