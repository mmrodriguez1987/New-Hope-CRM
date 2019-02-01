<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhkidAssistanceKidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhkid_assistance_kids', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parent_in');
            $table->string('parent_out');
            $table->unsignedInteger('kids_id')->reference('id')->on('persons');
            $table->unsignedInteger('group_id')->unsigned()->reference('id')->on('nhkid_groups');
            $table->unsignedInteger('report_id')->unsigned()->reference('id')->on('nhkid_reports');
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
        Schema::dropIfExists('nhkid_assistance_kids');
    }
}
