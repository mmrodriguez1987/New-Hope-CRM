<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciorptdetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviciorptdetalle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serviciorpt_id')->reference('id')->on('serviciorpt');
            $table->integer('serviciorequisitos_id')->reference('id')->on('serviciorequisitos');
            $table->boolean('cumplido');
            $table->longtext('observacion');
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
        Schema::dropIfExists('serviciorptdetalle');
    }
}
