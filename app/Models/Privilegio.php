<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{
    use HasFactory;

    protected $table = "tbl_privilegios";

    protected $primary_key = 'PK_ID_privilegios';

    public $incrementing = true;

    protected $guarded = ['PK_ID_privilegios'];

    public function rolprivilegios() {
        return $this->hasMany('App\Models\RolPrivilegio', 'FK_ID_privilegios', 'PK_ID_rol_privilegio');
    }

}
