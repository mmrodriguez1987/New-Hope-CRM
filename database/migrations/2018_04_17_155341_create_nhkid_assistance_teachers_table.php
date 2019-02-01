<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhkidAssistanceTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhkid_assistance_teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('teaching_taught');
            $table->datetime('start_time');
            $table->longtext('observation');
            $table->unsignedInteger('teacher_id')->reference('id')->on('persons');
            $table->unsignedInteger('group_id')->reference('id')->on('nhkid_academy_groups');
            $table->unsignedInteger('report_id')->reference('id')->on('nhkid_reports');     
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
        Schema::dropIfExists('nhkid_assistance_teachers');
    }
}
