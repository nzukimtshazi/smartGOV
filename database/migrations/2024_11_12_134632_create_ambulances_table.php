<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbulancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('ambulances')) {
            Schema::create('ambulances', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('count');
                $table->bigInteger('district_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('ambulances', function ($table) {
                $table->foreign('district_id')->references('id')->on('districts');
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
        Schema::dropIfExists('ambulances');
    }
}
