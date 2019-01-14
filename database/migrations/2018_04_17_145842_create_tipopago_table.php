<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipopagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipopago', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('user_creac_id')->reference('id')->on('users');
            $table->unsignedInteger('user_creac_id');
            $table->integer('user_modif_id')->reference('id')->on('users');
            $table->unsignedInteger('user_modif_id');
            $table->boolean('active', true);
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
        Schema::dropIfExists('tipopago');
    }
}
