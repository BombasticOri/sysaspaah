<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaeMaquinariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_maquinaria', function (Blueprint $table) {
            $table->id('PK_ID_maquinaria');
            $table->string('CO_maquinaria', 10);
            $table->char('TI_maquinaria', 1)->nullable();
            $table->char('DE_modelo', 1)->nullable();
            $table->string('DE_potencia', 10);
            $table->string('DE_cilindros', 10);
            $table->string('DE_maquinaria', 100);
            $table->char('ES_maquinaria', 1)->nullable();
            $table->string('DE_observaciones', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_maquinaria');
    }
}
