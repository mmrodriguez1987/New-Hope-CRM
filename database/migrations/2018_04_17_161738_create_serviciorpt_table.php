<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciorptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviciorpt', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persona_ministro_resp_id')->refrence('id')->on('persona');
            $table->date('fecha');
            $table->longtext('comentario');
            $table->integer('persona_srv_ppt_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_cam1_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_cam2_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_cam3_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_snd1_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_snd2_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_dircam_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_social1_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_social2_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_lib1_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_lib2_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_lduj_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_ldesc_id')->refrence('id')->on('persona');
            $table->integer('persona_srv_esc_id')->refrence('id')->on('persona');
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
        Schema::dropIfExists('serviciorpt');
    }
}
