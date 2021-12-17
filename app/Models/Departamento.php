<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = "mae_departamento";

    protected $primaryKey = 'PK_ID_departamento';

    public $incrementing = true;

    protected $guarded = ['PK_ID_departamento'];

    public function provincias() {
        return $this->hasMany('App\Models\Provincia', 'FK_ID_departamento', 'PK_ID_provincia');
    }
}
