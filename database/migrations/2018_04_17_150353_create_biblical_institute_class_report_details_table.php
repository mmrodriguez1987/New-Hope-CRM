<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiblicalInstituteClassReportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biblical_institute_class_report_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('membership_assistence_id')->reference('id')->on('biblical_institute_memberships');
            $table->longtext('observation');
            $table->datetime('hour_init');
            $table->integer('rpt_class_id')->reference('id')->on('biblical_institute_class_reports');
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
        Schema::dropIfExists('biblical_institute_class_report_details');
    }
}
