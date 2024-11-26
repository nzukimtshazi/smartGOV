<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('complaint_management')) {
            Schema::create('complaint_management', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('telephoneNo');
                $table->integer('mobileNo');
                $table->string('email');
                $table->string('caller_type');
                $table->string('company');
                $table->string('contact_person');
                $table->string('location');
                $table->string('location_ofIncident');
                $table->string('additional_info');
                $table->string('reference');
                $table->bigInteger('district_id')->unsigned();
                $table->bigInteger('user_id')->unsigned();
                $table->bigInteger('complaints_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('complaint_management', function ($table) {
                $table->foreign('district_id')->references('id')->on('districts');
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('complaints_id')->references('id')->on('complaints');
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
        Schema::dropIfExists('complaint_management');
    }
}
