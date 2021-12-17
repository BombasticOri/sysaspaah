<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_persona', function (Blueprint $table) {
            $table->id('PK_ID_persona');
            $table->string('NO_persona', 50);
            $table->string('AP_paterno_persona', 30);
            $table->string('AP_materno_persona', 30);
            $table->char('TI_sexo', 1)->nullable();
            $table->integer('NU_dni');
            $table->integer('NU_celular');
            $table->string('DI_persona', 100);
            $table->string('IM_persona', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_persona');
    }
}
