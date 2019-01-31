<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHopeHouseReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hope_house_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('teaching_taught');
            $table->string('teaching_taught_lnk');
            $table->double('offering', 8, 2);
            $table->string('note');
            $table->integer('hope_house_id')->reference('id')->on('hope_houses');
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
        Schema::dropIfExists('hope_house_reports');
    }
}
