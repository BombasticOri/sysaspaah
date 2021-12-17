<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_asistencia', function (Blueprint $table) {
            $table->id('PK_ID_con_event');
            $table->unsignedBigInteger('FK_ID_eventos');
            $table->foreign('FK_ID_eventos', 'eventos_tbl_control_eventos_fk')->references('PK_ID_eventos')->on('mae_eventos');
            $table->unsignedBigInteger('FK_ID_socio');
            $table->foreign('FK_ID_socio', 'tbl_socio_tbl_control_eventos_fk')->references('PK_ID_socio')->on('tbl_socio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_asistencia');
    }
}
