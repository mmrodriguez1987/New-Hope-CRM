<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHopeHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hope_houses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('person_charge_name');
            $table->string('address');
            $table->string('street');
            $table->string('city');
            $table->integer('postal_code');
            $table->integer('lider_id')->reference('id')->on('persona');
            $table->integer('coolab1_id')->reference('id')->on('persona');
            $table->integer('coolab2_id')->reference('id')->on('persona');
            $table->date('fecha_apertura');
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
        Schema::dropIfExists('hope_houses');
    }
}
