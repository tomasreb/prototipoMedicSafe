<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('part_id')->nullable();
            $table->unsignedInteger('medic_id')->nullable();
            $table->string('ruta_imagen')->nullable();
            $table->string('informe')->nullable();
            $table->string('ruta_imagen_informe')->nullable();
            $table->string('lugar_atencion')->nullable();




            $table->timestamps();



            //relationships

            $table->foreign('part_id')->references('id')->on('parts');
            $table->foreign('medic_id')->references('id')->on('medics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studies');
    }
}
