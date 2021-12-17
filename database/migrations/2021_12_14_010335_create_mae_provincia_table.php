<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaeProvinciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_provincia', function (Blueprint $table) {
            $table->id('PK_ID_provincia');
            $table->string('NO_distrito', 200);
            $table->unsignedBigInteger('FK_ID_departamento');
            $table->foreign('FK_ID_departamento', 'mae_departamento_mae_distrito_fk')->references('PK_ID_departamento')->on('mae_departamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_provincia');
    }
}
