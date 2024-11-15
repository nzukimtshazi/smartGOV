<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirAmbulanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('air_ambulance')) {
            Schema::create('air_ambulance', function (Blueprint $table) {
                $table->id();
                $table->string('name', 60);
                $table->string('telephoneNo', 10);
                $table->string('mobileNo', 10);
                $table->string('institution_type', 30);
                $table->string('aircraft_type', 30);
                $table->string('caller_type', 30);
                $table->string('service_provider', 30);
                $table->string('motivation', 60);
                $table->string('referring_district', 30);
                $table->string('referring_institution', 30);
                $table->string('referring_ward', 30);
                $table->string('referring_doctor', 30);
                $table->string('referring_telephoneNo', 10);
                $table->string('referring_mobileNo', 10);
                $table->string('receiving_district', 30);
                $table->string('receiving_institution', 30);
                $table->string('receiving_ward', 30);
                $table->string('receiving_doctor', 30);
                $table->string('receiving_telephoneNo', 10);
                $table->string('receiving_mobileNo', 10);
                $table->string('patientName', 30);
                $table->string('gender', 10);
                $table->integer('age');
                $table->string('weight', 10);
                $table->string('diagnosis', 30);
                $table->string('hotResponse_district', 30);
                $table->string('weather', 20);
                $table->string('GPS_latitude', 20);
                $table->string('GPS_longitude', 20);
                $table->string('pickUp_point', 30);
                $table->string('landing_area', 30);
                $table->string('landmarks', 30);
                $table->string('ground_contact', 30);
                $table->string('marking_devices', 30);
                $table->string('request_status', 30);
                $table->string('updated_by', 30);
                $table->string('time_authorized', 10);
                $table->string('reason', 30);
                $table->string('standDown_name', 30);
                $table->string('notification', 30);
                $table->string('standDown_reason', 30);
                $table->string('respiratory', 20);
                $table->integer('respiratory_rate');
                $table->string('airway_methods', 20);
                $table->string('PEEP', 3);
                $table->string('interCoastal_drain', 15);
                $table->string('drug_name', 20);
                $table->string('dose', 10);
                $table->string('fluid_amount_andType', 20);
                $table->integer('druInfuse_rate');
                $table->string('drug_start', 10);
                $table->string('drug_stop', 10);
                $table->string('drug_left', 10);
                $table->integer('pulse_rate');
                $table->string('pulse_rhythm', 10);
                $table->string('blood_pressure', 10);
                $table->string('IVLine_central', 10);
                $table->string('paceMaker', 10);
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
                $table->string('Na+', 10);
                $table->string('k+', 10);
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
                $table->string('time_mobile', 10);
                $table->string('ETD', 15);
                $table->string('arrive_fuel', 15);
                $table->string('place', 15);
                $table->string('depart_refuel', 15);
                $table->string('ETA_toScene', 15);
                $table->string('person_informed', 30);
                $table->string('depart_scene', 15);
                $table->string('ETA_toDestination', 15);
                $table->string('arrive_scene', 15);
                $table->string('depart_destination', 15);
                $table->string('arrive_destination', 15);
                $table->string('ETA_toBase', 15);
                $table->string('arrive_base', 15);
                $table->string('total_airtime', 15);
                $table->string('additional_info', 30);
                $table->string('reference', 15);
                $table->bigInteger('district_id')->unsigned();
                $table->bigInteger('institution_id')->unsigned();
                $table->bigInteger('user_id')->unsigned();
                $table->bigInteger('caseType_id')->unsigned();
                $table->bigInteger('incident_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('air_ambulance', function ($table) {
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
        Schema::dropIfExists('air_ambulance');
    }
}
