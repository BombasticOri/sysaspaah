<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaeComunidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_comunidad', function (Blueprint $table) {
            $table->id('PK_ID_comunidad');
            $table->string('NO_comunidad', 200);
            $table->unsignedBigInteger('FK_ID_distrito');
            
            $table->foreign('FK_ID_distrito', 'mae_distrito_mae_comunidad_fk')->references('PK_ID_distrito')->on('mae_distrito');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_comunidad');
    }
}
