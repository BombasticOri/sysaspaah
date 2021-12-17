<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model
{
    use HasFactory;

    protected $table = "mae_comunidad";

    protected $primaryKey = 'PK_ID_comunidad';

    public $incrementing = true;

    protected $guarded = ['PK_ID_comunidad'];

    public function distrito() {
        return $this->belongsTo('App\Models\Distrito', 'FK_ID_distrito', 'PK_ID_comunidad');
    }

    public function socios() {
        return $this->hasMany('App\Models\Socio', 'FK_ID_comunidad', 'PK_ID_socio');
    }
}
