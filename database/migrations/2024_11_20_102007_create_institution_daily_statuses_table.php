<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionDailyStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('institution_daily_statuses')) {
            Schema::create('institution_daily_statuses', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('mobileNo');
                $table->string('email');
                $table->string('institution_type');
                $table->string('manager');
                $table->integer('contactNo');
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
                $table->bigInteger('user_id')->unsigned();
                $table->bigInteger('role_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('institution_daily_statuses', function ($table) {
                $table->foreign('district_id')->references('id')->on('districts');
                $table->foreign('institution_id')->references('id')->on('institutions');
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('institution_daily_statuses');
    }
}
