<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionDailyStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('institution_daily_status')) {
            Schema::create('institution_daily_status', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('role');
                $table->string('mobileNo');
                $table->string('email');
                $table->string('institution_type');
                $table->string('manager');
                $table->string('contactNo');
                $table->integer('no_of_admissions');
                $table->string('admission_information');
                $table->integer('no_of_deaths');
                $table->string('cause_of_death');
                $table->integer('no_of_births');
                $table->string('births_information');
                $table->string('call_status');
                $table->string('reference');
                $table->bigInteger('district_id')->unsigned();
                $table->bigInteger('institution_id')->unsigned();
                $table->bigInteger('department_id')->unsigned();
                $table->bigInteger('user_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('institution_daily_status', function ($table) {
                $table->foreign('district_id')->references('id')->on('districts');
                $table->foreign('institution_id')->references('id')->on('institutions');
                $table->foreign('department_id')->references('id')->on('departments');
                $table->foreign('user_id')->references('id')->on('users');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institution_daily_status');
    }
}
