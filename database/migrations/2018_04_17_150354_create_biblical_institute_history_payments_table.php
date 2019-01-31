<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiblicalInstituteHistyPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biblical_institute_history_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('membership_id')->reference('id')->on('biblical_institute_memberships');
            $table->integer('payment_type_id')->reference('id')->on('payment_types');
            $table->double('amount', 8, 2);
            $table->mediumtext('observation');
            $table->string('description');
            $table->date('payment_date');
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
        Schema::dropIfExists('biblical_institute_history_payments');
    }
}
