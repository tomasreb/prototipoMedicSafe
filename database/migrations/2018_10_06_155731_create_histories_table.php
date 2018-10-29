<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique();
            $table->string('name')->nullable();
            $table->timestamps();
            $table->enum('grupo_sanguineo',['A+', 'A-','B+','B-','AB+','AB-','0+','0-',])->default('A+');
            $table->enum('tatuajes', ['SI', 'NO'])->default('NO');
            $table->enum('diabetes', ['SI', 'NO'])->default('NO');
            $table->enum('vih', ['SI', 'NO'])->default('NO');
            $table->string('cardiopatias')->nullable();
            $table->enum('tabaquismo' , ['SI', 'NO' ,'EVENTUAL'])->default('EVENTUAL');
            $table->enum('alcoholismo', ['SI', 'NO' ,'EVENTUAL'])->default('EVENTUAL');


            //relationship

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
