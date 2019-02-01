<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjierReportServantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujier_report_servants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ujier_id')->refrence('id')->on('persons');
            $table->date('start_time');
            $table->longtext('observation');
            $table->unsignedInteger('reporte_id')->reference('id')->on('ujier_reports');
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
        Schema::dropIfExists('ujier_report_servants');
    }
}
