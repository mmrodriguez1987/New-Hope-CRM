<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjiereporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujiereporte', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('totalasisntecia');
            $table->integer('persona_capitan_id')->unsigned()->refrence('id')->on('persona');
            $table->longtext('observacion');
            $table->integer('user_creac_id')->unsigned()->reference('id')->on('users');
            $table->integer('user_modif_id')->unsigned()->reference('id')->on('users');
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
        Schema::dropIfExists('ujiereporte');
    }
}
