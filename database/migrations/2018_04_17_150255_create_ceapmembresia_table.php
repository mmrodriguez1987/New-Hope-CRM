<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCeapmembresiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ceapmembresia', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_ingreso');
            $table->mediumtext('nota');
            $table->integer('persona_estudiante_id')->reference('id')->on('persona');
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
        Schema::dropIfExists('ceapmembresia');
    }
}
