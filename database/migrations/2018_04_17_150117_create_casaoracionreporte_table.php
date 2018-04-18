<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasaoracionreporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casaoracionreporte', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('tema_impartido');
            $table->string('tema_impart_doc_lnk');
            $table->double('ofrenda',8,2);
            $table->string('nota');
            $table->integer('casaoracion_id')->reference('id')->on('casaoracion');
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
        Schema::dropIfExists('casaoracionreporte');
    }
}
