<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirAmbulancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('air_ambulances')) {
            Schema::create('air_ambulances', function (Blueprint $table) {
                $table->id();
                $table->string('name', 30);
                $table->integer('telephoneNo');
                $table->integer('mobileNo');
                $table->string('institution_type', 30);
                $table->string('aircraft_type', 30);
                $table->string('caller_type', 30);
                $table->string('service_provider', 30);
                $table->string('motivation', 30);
                $table->string('referring_district', 30);
                $table->string('referring_institution', 30);
                $table->string('referring_ward', 30);
                $table->string('referring_doctor', 30);
                $table->integer('referring_telephoneNo');
                $table->integer('referring_mobileNo');
                $table->string('receiving_district', 30);
                $table->string('receiving_institution', 30);
                $table->string('receiving_ward', 30);
                $table->string('receiving_doctor', 30);
                $table->integer('receiving_telephoneNo');
                $table->integer('receiving_mobileNo');
                $table->string('patientName', 30);
                $table->string('gender', 30);
                $table->integer('age');
                $table->string('weight', 10);
                $table->string('diagnosis', 30);
                $table->string('hotResponse_district', 30);
                $table->string('weather', 30);
                $table->string('GPS_latitude', 20);
                $table->string('GPS_longitude', 20);
                $table->string('pickUp_point', 30);
                $table->string('landing_area', 30);
                $table->string('landmarks', 30);
                $table->string('ground_contact', 30);
                $table->string('marking_devices', 30);
                $table->string('request_status', 30);
                $table->string('updated_by', 30);
                $table->time('time_authorized');
                $table->string('reason', 30);
                $table->string('standDown_name', 30);
                $table->string('notification', 30);
                $table->string('standDown_reason', 30);
                $table->string('respiratory', 20);
                $table->integer('respiratory_rate');
                $table->string('airway_methods', 20);
                $table->string('PEEP', 20);
                $table->string('interCoastal_drain', 20);
                $table->string('drug_name', 20);
                $table->string('dose', 15);
                $table->string('fluid_amount_andType', 20);
                $table->integer('drugInfuse_rate');
                $table->time('drug_start');
                $table->time('drug_stop');
                $table->string('drug_left', 10);
                $table->integer('pulse_rate');
                $table->string('pulse_rhythm', 10);
                $table->string('blood_pressure', 10);
                $table->string('IVLine_central', 10);
                $table->string('pacemaker', 10);
                $table->string('IVLine_peripheral', 10);
                $table->string('arterial_line', 10);
                $table->string('glasgow_comaScale', 10);
                $table->string('eyes', 15);
                $table->string('motor', 15);
                $table->string('verbal', 15);
                $table->string('pupils', 15);
                $table->string('left_pupil', 5);
                $table->string('right_pupil', 5);
                $table->string('ph', 10);
                $table->string('p02', 10);
                $table->string('pC02', 10);
                $table->string('Hc03', 10);
                $table->string('Sa02', 10);
                $table->string('Hb', 10);
                $table->string('WWC', 10);
                $table->string('Napos', 10);
                $table->string('kpos', 10);
                $table->string('urea', 10);
                $table->string('cardiac_enzymes', 10);
                $table->string('terpinen_T', 10);
                $table->string('CPK', 10);
                $table->string('sugar_level', 10);
                $table->string('ventilator', 10);
                $table->string('ECG_monitor', 10);
                $table->string('capnograph', 10);
                $table->string('cervical_traction', 10);
                $table->string('incubator', 10);
                $table->string('hot_box', 10);
                $table->string('other', 20);
                $table->time('time_mobile');
                $table->time('ETD');
                $table->time('arrive_refuel');
                $table->string('place', 30);
                $table->time('depart_refuel');
                $table->time('ETA_toScene');
                $table->time('arrive_scene');
                $table->string('scenePerson_informed', 30);
                $table->time('depart_scene');
                $table->time('ETA_toDestination');
                $table->time('arrive_destination');
                $table->string('destPerson_informed', 30);
                $table->time('depart_destination');
                $table->time('ETA_toBase');
                $table->time('arrive_base');
                $table->string('total_airtime', 15);
                $table->string('additional_info', 30);
                $table->string('status', 30);
                $table->string('reference', 15);
                $table->bigInteger('district_id')->unsigned();
                $table->bigInteger('institution_id')->unsigned();
                $table->bigInteger('user_id')->unsigned();
                $table->bigInteger('caseType_id')->unsigned();
                $table->bigInteger('incident_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('air_ambulances', function ($table) {
                $table->foreign('district_id')->references('id')->on('districts');
                $table->foreign('institution_id')->references('id')->on('institutions');
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('caseType_id')->references('id')->on('case_types');
                $table->foreign('incident_id')->references('id')->on('incidents');
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
        Schema::dropIfExists('air_ambulances');
    }
}
