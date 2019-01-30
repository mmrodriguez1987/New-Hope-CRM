<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjierptdetalleservidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujierptdetalleservidores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persona_ujier_id')->unsigned()->refrence('id')->on('persona');
            $table->date('horallegada');
            $table->longtext('observacion');
            $table->integer('ujiereporte_id')->unsigned()->reference('id')->on('ujiereporte');
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
        Schema::dropIfExists('ujierptdetalleservidores');
    }
}
