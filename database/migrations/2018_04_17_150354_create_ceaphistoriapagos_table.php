<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCeaphistoriapagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ceaphistoriapagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('membresia_id')->unsigned()->reference('id')->on('ceapmembresia');
            $table->integer('tipopago_id')->unsigned()->reference('id')->on('tipopago');
            $table->double('monto', 8, 2);
            $table->mediumtext('observacion');
            $table->string('concepto_pago');
            $table->date('fechapago');
            $table->integer('user_creac_id')->unsigned()->reference('id')->on('users');
            $table->integer('user_modif_id')->unsigned()->reference('id')->on('users');
            $table->char('active', 1)->default('a');
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
        Schema::dropIfExists('ceaphistoriapagos');
    }
}
