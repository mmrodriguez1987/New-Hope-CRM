<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('maritalstatus');
            $table->date('birthdate');
            $table->char('sex', 1);
            $table->string('address');
            $table->string('street');
            $table->integer('zipcode');
            $table->string('city');
            $table->char('state', 2);
            $table->string('email');
            $table->string('cnt_emerg_name');
            $table->string('cnt_emerg_phone');
            $table->string('cnt_emerg_address');
            $table->string('crt_employer_name');
            $table->string('crt_employer_address');
            $table->string('position_id')->reference('id')->on('positions');
            $table->unsignedInteger('position_id');
            $table->string('persontype_id')->reference('id')->on('persontypes');
            $table->unsignedInteger('persontype_id');
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
        Schema::dropIfExists('persons');
    }
}
