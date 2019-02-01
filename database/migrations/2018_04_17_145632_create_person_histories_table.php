<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->date('event_date');
            $table->unsignedInteger('resp_leader_id')->reference('id')->on('persons');
            $table->unsignedInteger('invl_person_id')->reference('id')->on('persons');
            $table->unsignedInteger('event_id')->reference('id')->on('events');
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
        Schema::dropIfExists('person_histories');
    }
}
