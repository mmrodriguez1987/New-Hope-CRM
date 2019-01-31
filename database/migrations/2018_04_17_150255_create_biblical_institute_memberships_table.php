<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiblicalInstituteMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biblical_institute_memberships', function (Blueprint $table) {
            $table->increments('id');
            $table->date('admission_date');
            $table->mediumtext('note');
            $table->integer('student_id')->unsigned()->reference('id')->on('persons');
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
        Schema::dropIfExists('biblical_institute_memberships');
    }
}
