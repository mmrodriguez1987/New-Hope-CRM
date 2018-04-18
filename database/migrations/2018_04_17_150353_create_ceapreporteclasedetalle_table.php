<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCeapreporteclasedetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ceapreporteclasedetalle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ceap_memb_asis_id')->reference('id')->on('ceapmembresia');
            $table->longtext('observ');
            $table->datetime('hora_entrada');
            $table->integer('ceapreporteclase_id')->reference('id')->on('ceapreporteclase');
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
        Schema::dropIfExists('ceapreporteclasedetalle');
    }
}
