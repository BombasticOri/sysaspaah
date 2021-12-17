<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRolPrivTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_rol_priv', function (Blueprint $table) {
            $table->id('PK_ID_rol_privilegio');
            $table->unsignedBigInteger('FK_ID_rol');
            $table->foreign('FK_ID_privilegios', 'privilegios_rol_priv_fk')->references('PK_ID_privilegios')->on('tbl_privilegios');
            $table->unsignedBigInteger('FK_ID_privilegios');
            $table->foreign('FK_ID_rol', 'rol_rol_priv_fk')->references('PK_ID_rol')->on('tbl_rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_rol_priv');
    }
}
