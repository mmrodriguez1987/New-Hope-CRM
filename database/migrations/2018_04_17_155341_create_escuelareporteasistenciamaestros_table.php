<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscuelareporteasistenciamaestrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelareporteasistenciamaestros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clase_impt');
            $table->datetime('horaentrada');
            $table->longtext('observacion');
            $table->integer('persona_maestro_id')->reference('id')->on('persona');
            $table->integer('escuela_grp_id')->reference('id')->on('escuelagrupo');
            $table->integer('escuela_rpt_id')->reference('id')->on('escuelareporte');
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
        Schema::dropIfExists('escuelareporteasistenciamaestros');
    }
}
