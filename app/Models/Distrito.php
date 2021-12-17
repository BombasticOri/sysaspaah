<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $table = "mae_distrito";

    protected $primaryKey = 'PK_ID_distrito';

    public $incrementing = true;

    protected $guarded = ['PK_ID_distrito'];

    public function provincia() {
        return $this->belongsTo('App\Models\Provincia', 'FK_ID_distrito', 'PK_ID_distrito');
    }

    public function comunidades() {
        return $this->hasMany('App\Models\Comunidad', 'FK_ID_distrito', 'PK_ID_comunidad');
    }
}
