<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personhistory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->date('event_date');
            $table->integer('resp_leader_id')->reference('id')->on('persona');
            $table->unsignedInteger('resp_leader_id');
            $table->integer('invl_person_id')->reference('id')->on('persona');
            $table->unsignedInteger('invl_person_id');
            $table->integer('event_id')->reference('id')->on('evento');
            $table->unsignedInteger('event_id');
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
        Schema::dropIfExists('personhistory');
    }
}
