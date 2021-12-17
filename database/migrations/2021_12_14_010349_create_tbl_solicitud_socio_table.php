<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSolicitudSocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_solicitud_socio', function (Blueprint $table) {
            $table->id('PK_ID_sol_socio');
            $table->string('NO_solicitante', 50);
            $table->string('AP_paterno_solicitante', 30);
            $table->string('AP_materno_solicitante', 30);
            $table->char('ES_solicitud', 1)->nullable();
            $table->date('FE_creado');
            $table->unsignedBigInteger('FK_ID_persona');
            $table->foreign('FK_ID_persona', 'mae_persona_tbl_solicitud_fk')->references('PK_ID_persona')->on('mae_persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_solicitud_socio');
    }
}
