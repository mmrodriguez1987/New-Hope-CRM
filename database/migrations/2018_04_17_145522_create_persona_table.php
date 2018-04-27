<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('estadocivil');
            $table->date('fechanac');
            $table->char('sexo', 1);
            $table->string('direccion1');
            $table->string('direccion2');
            $table->integer('zipcode');
            $table->string('ciudad');
            $table->string('email');
            $table->string('cntct_emerg_nombre');
            $table->string('cntct_emerg_numero');
            $table->string('cntct_emerg_direccion');
            $table->string('empleador_actual');
            $table->string('empleador_actual_dir');
            $table->string('cargo_id')->reference('id')->on('cargos');
            $table->string('tipopersona_id')->reference('id')->on('personatipo');
            $table->integer('user_creac_id')->reference('id')->on('users');
            $table->integer('user_modif_id')->reference('id')->on('users');
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
        Schema::dropIfExists('persona');
    }
}
