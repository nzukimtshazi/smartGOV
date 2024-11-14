<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyOperationalStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('daily_operational_status')) {
            Schema::create('daily_operational_status', function (Blueprint $table) {
                $table->id();
                $table->date('operational_date');
                $table->string('shift');
                $table->string('caller');
                $table->string('position');
                $table->bigInteger('district_id')->unsigned();
                $table->bigInteger('ambulance_id')->unsigned();
                $table->bigInteger('pts_bus_id')->unsigned();
                $table->bigInteger('support_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('daily_operational_status', function ($table) {
                $table->foreign('district_id')->references('id')->on('districts');
                $table->foreign('ambulance_id')->references('id')->on('ambulances');
                $table->foreign('pts_bus_id')->references('id')->on('pts_buses');
                $table->foreign('support_id')->references('id')->on('operational_support');
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
        Schema::dropIfExists('daily_operational_status');
    }
}
