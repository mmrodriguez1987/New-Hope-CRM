<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasaoracionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casaoracion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('direccion1');
            $table->string('direccion2');
            $table->string('ciudad');
            $table->integer('zipcode');
            $table->integer('lider_id')->reference('id')->on('persona');
            $table->unsignedInteger('lider_id');
            $table->integer('coolab1_id')->reference('id')->on('persona');
            $table->unsignedInteger('coolab1_id');
            $table->integer('coolab2_id')->reference('id')->on('persona');
            $table->unsignedInteger('coolab2_id');
            $table->date('fecha_apertura');
            $table->integer('user_creac_id')->reference('id')->on('users');
            $table->unsignedInteger('user_creac_id');
            $table->integer('user_modif_id')->reference('id')->on('users');
            $table->unsignedInteger('user_modif_id');
            $table->char('active', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casaoracion');
    }
}
