<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaeDistritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_distrito', function (Blueprint $table) {
            $table->id('PK_ID_distrito');
            $table->string('NO_provincia', 200);
            $table->unsignedBigInteger('FK_ID_provincia');
            
            $table->foreign('FK_ID_provincia', 'mae_provincia_mae_distrito_fk')->references('PK_ID_provincia')->on('mae_provincia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_distrito');
    }
}
