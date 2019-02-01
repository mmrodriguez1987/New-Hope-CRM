<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRunReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_run_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('leader_id')->refrence('id')->on('persons');
            $table->date('date');
            $table->longtext('note');
            $table->unsignedInteger('person_on_ppt_id')->refrence('id')->on('persons');
            $table->unsignedInteger('person_on_cam1_id')->refrence('id')->on('persons');
            $table->unsignedInteger('person_on_cam2_id')->refrence('id')->on('persons');
            $table->unsignedInteger('person_on_cam3_id')->refrence('id')->on('persons');
            $table->unsignedInteger('person_on_snd1_id')->refrence('id')->on('persons');
            $table->unsignedInteger('person_on_snd2_id')->refrence('id')->on('persons');
            $table->unsignedInteger('person_on_dircam_id')->refrence('id')->on('persons');
            $table->unsignedInteger('person_on_social1_id')->refrence('id')->on('persons');
            $table->unsignedInteger('person_on_social2_id')->refrence('id')->on('persons');
            $table->unsignedInteger('person_on_lib1_id')->refrence('id')->on('persons');
            $table->unsignedInteger('person_on_lib2_id')->refrence('id')->on('persons');
            $table->unsignedInteger('person_on_lduj_id')->refrence('id')->on('persons');
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
        Schema::dropIfExists('service_run_reports');
    }
}
