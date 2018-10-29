<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('medic_id');
            $table->unsignedInteger('history_id');
            $table->string('motivo');
            $table->string('sintomas');
            $table->string('enfermedad_actual');
            $table->string('diagnostico');
            $table->string('tratamiento');
            $table->enum('solicito_estudios',['SI', 'NO'])->default('NO');
            $table->string('estudio_solicitado')->nullable();
            $table->string('lugar_atencion')->nullable();










            $table->timestamps();




            //relationship

            $table->foreign('medic_id')->references('id')->on('medics');
            $table->foreign('history_id')->references('id')->on('histories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
}
