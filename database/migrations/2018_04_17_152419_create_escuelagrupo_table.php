<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscuelagrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelagrupo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_creac_id')->unsigned()->reference('id')->on('users');
            $table->integer('user_modif_id')->unsigned()->reference('id')->on('users');
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
        Schema::dropIfExists('escuelagrupo');
    }
}
