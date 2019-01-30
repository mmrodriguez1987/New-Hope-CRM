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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('marital_status');
            $table->date('birthdate');
            $table->char('sex', 1);
            $table->string('address');
            $table->string('street');
            $table->integer('postal_code');
            $table->string('city');
            $table->char('state', 2);
            $table->string('email');
            $table->string('cnt_emerg_name');
            $table->string('cnt_emerg_phone');
            $table->string('cnt_emerg_address');
            $table->string('crt_employer_name');
            $table->string('crt_employer_address');
            $table->integer('position_id')->reference('id')->on('positions');
            $table->integer('person_type_id')->reference('id')->on('person_types');
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
