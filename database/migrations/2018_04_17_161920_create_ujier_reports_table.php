<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjierReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujier_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('assistence_total');
            $table->unsignedInteger('captain_id')->refrence('id')->on('persons');
            $table->longtext('observation');
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
        Schema::dropIfExists('ujier_reports');
    }
}
