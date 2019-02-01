<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRunReportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_run_report_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('report_id')->reference('id')->on('service_run_reports');
            $table->unsignedInteger('requeriment_id')->reference('id')->on('service_run_requirements');
            $table->boolean('completed');
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
        Schema::dropIfExists('service_run_report_details');
    }
}
