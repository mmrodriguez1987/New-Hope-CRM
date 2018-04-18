<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasaoracionreportedetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casaoracionreportedetalle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persona_asistencia_id')->reference('id')->on('persona');
            $table->integer('casaoracionreporte_id')->reference('id')->on('casaoracionreporte');
            $table->mediumtext('nota');
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
        Schema::dropIfExists('casaoracionreportedetalle');
    }
}
