<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHopeHouseReportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hope_house_report_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('assistant_person_id')->reference('id')->on('persons');
            $table->unsignedInteger('hope_house_report_id')->reference('id')->on('hope_house_reports');
            $table->mediumtext('note');
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
        Schema::dropIfExists('hope_house_report_details');
    }
}
