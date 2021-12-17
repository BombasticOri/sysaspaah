<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaeEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_eventos', function (Blueprint $table) {
            $table->id('PK_ID_eventos');
            $table->string('NO_eventos', 50);
            $table->string('NO_lugar', 100);
            $table->date('FE_inicio');
            $table->date('FE_fin');
            $table->string('DE_eventos', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_eventos');
    }
}
