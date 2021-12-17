<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table = "mae_provincia";

    protected $primaryKey = 'PK_ID_provincia';

    public $incrementing = true;

    protected $guarded = ['PK_ID_provincia'];

    public function departamento() {
        return $this->belongsTo('App\Models\Departamento','FK_ID_departamento','PK_ID_departamento');
    }

    public function distritos() {
        return $this->hasMany('App\Models\Distrito', 'FK_ID_provincia', 'PK_ID_distrito');
    }
}
