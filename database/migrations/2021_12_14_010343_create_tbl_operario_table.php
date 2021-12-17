<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOperarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_operario', function (Blueprint $table) {
            $table->unsignedBigInteger('PK_ID_operario');
            $table->foreign('PK_ID_operario', 'mae_persona_tbl_operario_fk')->references('PK_ID_persona')->on('mae_persona');
            $table->string('CO_operario', 10);
            $table->char('ES_operario', 1)->nullable();
            $table->unsignedBigInteger('FK_ID_maquinaria');
            $table->foreign('FK_ID_maquinaria', 'mae_maquinaria_tbl_operario_fk')->references('PK_ID_maquinaria')->on('mae_maquinaria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_operario');
    }
}
