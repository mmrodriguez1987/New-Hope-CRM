<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCeapreporteclaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ceapreporteclase', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('persona_lider_resp_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_ppt_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_snd_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_vta_id')->refrence('id')->on('persona');
            $table->double('monta_venta', 8, 2);
            $table->mediumtext('ensenanzas_impart');
            $table->datetime('hora_inicio');
            $table->datetime('hora_fin');
            $table->integer('persona_maestro_1_id')->refrence('id')->on('persona');
            $table->integer('persona_maestro_2_id')->refrence('id')->on('persona');
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
        Schema::dropIfExists('ceapreporteclase');
    }
}
