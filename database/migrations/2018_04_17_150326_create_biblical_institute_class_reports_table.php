<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiblicalInstituteClassReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biblical_institute_class_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->unsignedInteger('leader_respons_id')->refrence('id')->on('persons');
            $table->unsignedInteger('srv_ppt_id')->refrence('id')->on('persons');
            $table->unsignedInteger('srv_snd_id')->refrence('id')->on('persons');
            $table->unsignedInteger('srv_vta_id')->refrence('id')->on('persons');
            $table->double('sale_amount', 8, 2);
            $table->mediumtext('teaching_taught');
            $table->datetime('hour_init');
            $table->datetime('hour_end');
            $table->unsignedInteger('teacher_1_id')->refrence('id')->on('persons');
            $table->unsignedInteger('teacher_2_id')->refrence('id')->on('persons');  
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
        Schema::dropIfExists('biblical_institute_class_reports');
    }
}
