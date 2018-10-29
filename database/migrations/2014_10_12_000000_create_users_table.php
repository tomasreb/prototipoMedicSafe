<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //pacientes tabla

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 60 )->unique();
            $table->string('password');
            $table->unsignedInteger('codigo')->unique();
            $table->string('profile_image')->nullable();

            $table->unsignedInteger('dni')->nullable();
            $table->string('tel_cel')->nullable();
            $table->string('tel_fijo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('ruta_codigo')->nullable();



            $table->rememberToken();
            $table->timestamps();

            //relationship

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
