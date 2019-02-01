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
            $table->unsignedInteger('leader_id')->reference('id')->on('persons');
            $table->unsignedInteger('coolab1_id')->reference('id')->on('persons');
            $table->unsignedInteger('coolab2_id')->reference('id')->on('persons');
            $table->date('opening_date');
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
