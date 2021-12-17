<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_rol', function (Blueprint $table) {
            $table->id('PK_ID_user_rol');
            $table->unsignedBigInteger('FK_ID_usuario');
            $table->foreign('FK_ID_usuario', 'mae_usuarios_new_table__fk')->references('PK_ID_usuario')->on('tbl_usuarios');
            $table->unsignedBigInteger('FK_ID_rol');
            $table->foreign('FK_ID_rol', 'rol_new_table__fk')->references('PK_ID_rol')->on('tbl_rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_rol');
    }
}
