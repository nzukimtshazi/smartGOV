<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForensicMortuariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('forensic_mortuaries')) {
            Schema::create('forensic_mortuaries', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('contactNo');
                $table->integer('mobileNo');
                $table->string('deceased_name');
                $table->string('gender');
                $table->integer('age');
                $table->string('ethnic_group');
                $table->string('SAPS_caseNo');
                $table->string('cause_of_death');
                $table->string('place');
                $table->string('area_type');
                $table->string('deceased_pickUp_point');
                $table->string('guide_pickUp_point');
                $table->string('physical_address');
                $table->string('SAPS_name');
                $table->string('SAPS_station');
                $table->string('SAPS_time');
                $table->string('deceased_delivery_point');
                $table->string('delivery_service_provider');
                $table->string('transport_method');
                $table->string('provider');
                $table->string('service_providerName');
                $table->string('contactPerson');
                $table->string('fleetNo');
                $table->string('depot');
                $table->string('crew1');
                $table->string('crew2');
                $table->string('call_status');
                $table->string('reference');
                $table->bigInteger('district_id')->unsigned();
                $table->bigInteger('user_id')->unsigned();
                $table->bigInteger('classification_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('forensic_mortuaries', function ($table) {
                $table->foreign('district_id')->references('id')->on('districts');
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('classification_id')->references('id')->on('classifications');
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
        Schema::dropIfExists('forensic_mortuaries');
    }
}
