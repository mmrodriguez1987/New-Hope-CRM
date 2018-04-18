<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscuelareporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelareporte', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('lider_responsable_id')->reference('id')->on('persona');
            $table->integer('sublider_responsable_id')->reference('id')->on('persona');
            $table->longtext('nota');
            $table->double('ofrenda',8,2);
            $table->integer('escuela_tipo_id')->reference('id')->on('escuelatipo');
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
        Schema::dropIfExists('escuelareporte');
    }
}
