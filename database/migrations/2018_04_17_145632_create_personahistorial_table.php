<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonahistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personahistorial', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->date('fecha');
            $table->integer('lider_responsable_id')->reference('id')->on('persona');
            $table->integer('persona_involucrada_id')->reference('id')->on('persona');
            $table->integer('evento_id')->reference('id')->on('evento');
            $table->integer('user_creac_id')->reference('id')->on('users');
            $table->integer('user_modif_id')->reference('id')->on('users');
            $table->char('active',1);
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
        Schema::dropIfExists('personahistorial');
    }
}
