<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_contrato', function (Blueprint $table) {
            $table->id('PK_ID_contrato');
            $table->string('CO_contrato', 10);
            $table->date('FE_creado');
            $table->date('FE_inicio');
            $table->date('FE_fin');
            $table->string('DE_contrato', 200);
            $table->char('ES_contrato', 1)->nullable();
            $table->unsignedBigInteger('FK_ID_sol_maquinaria');
            $table->foreign('FK_ID_maquinaria', 'mae_maquinaria_tbl_contrato_fk')->references('PK_ID_maquinaria')->on('mae_maquinaria');
            $table->unsignedBigInteger('FK_ID_maquinaria');
            $table->foreign('FK_ID_operario', 'tbl_operario_tbl_contrato_fk')->references('PK_ID_operario')->on('tbl_operario');
            $table->unsignedBigInteger('FK_ID_operario');
            $table->foreign('FK_ID_sol_maquinaria', 'tbl_solicitud_maquinaria_tbl_contrato_fk')->references('PK_ID_sol_maquinaria')->on('tbl_solicitud_maquinaria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_contrato');
    }
}
