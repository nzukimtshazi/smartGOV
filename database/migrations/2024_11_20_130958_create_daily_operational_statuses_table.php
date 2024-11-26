<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyOperationalStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('daily_operational_statuses')) {
            Schema::create('daily_operational_statuses', function (Blueprint $table) {
                $table->id();
                $table->date('operational_date');
                $table->string('shift');
                $table->string('caller');
                $table->string('position');
                $table->string('reference');
                $table->string('additional_info');
                $table->bigInteger('user_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('daily_operational_statuses', function ($table) {
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
        Schema::dropIfExists('daily_operational_statuses');
    }
}
