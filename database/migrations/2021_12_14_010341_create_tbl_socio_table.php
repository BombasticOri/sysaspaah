<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_socio', function (Blueprint $table) {
            $table->unsignedBigInteger('PK_ID_socio');
            $table->foreign('PK_ID_socio', 'mae_persona_tbl_socio_fk')->references('PK_ID_persona')->on('mae_persona');
            $table->string('CO_socio', 10);
            $table->string('DE_observaciones', 250);
            $table->char('ES_socio', 1)->nullable();
            $table->unsignedBigInteger('FK_ID_comunidad');
            $table->foreign('FK_ID_comunidad', 'mae_comunidad_mae_persona_fk')->references('PK_ID_comunidad')->on('mae_comunidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_socio');
    }
}
