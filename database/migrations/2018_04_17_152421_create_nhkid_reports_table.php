<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhkidReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('nhkid_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('leader_id')->reference('id')->on('persons');
            $table->integer('subleader_id')->reference('id')->on('persons');
            $table->longtext('note');
            $table->double('offering', 8, 2);
            $table->integer('shift_id')->unsigned()->reference('id')->on('nhkid_shifts');
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
        Schema::dropIfExists('nhkid_reports');
    }
}
