<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSolicitudMaquinariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_solicitud_maquinaria', function (Blueprint $table) {
            $table->id('PK_ID_sol_maquinaria');
            $table->string('CO_solicitud', 10);
            $table->string('DE_solicitud', 150);
            $table->date('FE_inicio');
            $table->date('FE_fin');
            $table->char('ES_solicitud', 1)->nullable();
            $table->unsignedBigInteger('FK_ID_maquinaria');
            $table->foreign('FK_ID_maquinaria', 'mae_maquinaria_tbl_solicitud_maquinaria_fk')->references('PK_ID_maquinaria')->on('mae_maquinaria');
            $table->unsignedBigInteger('FK_ID_socio');
            $table->foreign('FK_ID_socio', 'tbl_socio_tbl_solicitud_maquinaria_fk')->references('PK_ID_socio')->on('tbl_socio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_solicitud_maquinaria');
    }
}
