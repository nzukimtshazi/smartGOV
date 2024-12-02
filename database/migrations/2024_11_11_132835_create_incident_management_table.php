<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('incident_management')) {
            Schema::create('incident_management', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('telephoneNo');
                $table->string('mobileNo');
                $table->string('email');
                $table->string('reportNo');
                $table->string('institution_type');
                $table->string('route');
                $table->string('GPS_latitude');
                $table->string('GPS_longitude');
                $table->string('incident_location');
                $table->integer('adult_entrapments');
                $table->integer('adult_red');
                $table->integer('adult_yellow');
                $table->integer('adult_green');
                $table->integer('adult_blue');
                $table->integer('adult_total');
                $table->integer('child_entrapments');
                $table->integer('child_red');
                $table->integer('child_yellow');
                $table->integer('child_green');
                $table->integer('child_blue');
                $table->integer('child_total');
                $table->string('response_ALS');
                $table->string('response_doctor');
                $table->string('PTV');
                $table->string('ESVs');
                $table->string('air_support');
                $table->string('response_co_ordination');
                $table->string('rescue');
                $table->string('disaster_bus');
                $table->string('truck');
                $table->string('fire_truck');
                $table->string('rescue_boat');
                $table->string('traffic_units');
                $table->string('SAPS_units');
                $table->string('other');
                $table->string('resource_ALS');
                $table->string('resource_doctor');
                $table->string('NSR');
                $table->string('sharks_board');
                $table->string('managers');
                $table->string('BLS');
                $table->string('drivers');
                $table->string('fire_fighters');
                $table->string('SAPS');
                $table->string('navy');
                $table->string('resource_airForce');
                $table->string('task_force');
                $table->string('army');
                $table->string('ILS');
                $table->string('resource_co_ordination');
                $table->string('mountain_rescue');
                $table->string('health_district');
                $table->string('health_institution');
                $table->string('health_institution_type');
                $table->integer('inst_blue');
                $table->integer('inst_red');
                $table->integer('inst_yellow');
                $table->integer('inst_green');
                $table->integer('inst_total');
                $table->string('response_time');
                $table->string('incident_time');
                $table->string('scene_duration');
                $table->string('total_time');
                $table->string('distance_toHospital');
                $table->string('private_EMS');
                $table->string('fire_services');
                $table->string('local_authority');
                $table->string('police');
                $table->string('services_airForce');
                $table->string('roadTraffic_inspectorate');
                $table->string('MRCC_activated');
                $table->string('call_status');
                $table->string('reference');
                $table->bigInteger('district_id')->unsigned();
                $table->bigInteger('institution_id')->unsigned();
                $table->bigInteger('user_id')->unsigned();
                $table->bigInteger('caller_id')->unsigned();
                $table->bigInteger('type_id')->unsigned();
                $table->bigInteger('first_onScene_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('incident_management', function ($table) {
                $table->foreign('district_id')->references('id')->on('districts');
                $table->foreign('institution_id')->references('id')->on('institutions');
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('caller_id')->references('id')->on('informers');
                $table->foreign('type_id')->references('id')->on('incident_types');
                $table->foreign('first_onScene_id')->references('id')->on('first_on_scenes');
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
        Schema::dropIfExists('incident_management');
    }
}
