<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('PK_ID_usuario');
            $table->foreign('PK_ID_usuario', 'mae_persona_mae_usuarios_fk')->references('PK_ID_persona')->on('mae_persona');
            $table->string('US_usuario', 50);
            $table->string('PS_usuario', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_usuarios');
    }
}
