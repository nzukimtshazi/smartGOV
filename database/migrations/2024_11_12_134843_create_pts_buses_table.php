<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtsBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('pts_buses')) {
            Schema::create('pts_buses', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('count');
                $table->date('operation_date');
                $table->string('reference');
                $table->bigInteger('district_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('pts_buses', function ($table) {
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
        Schema::dropIfExists('pts_buses');
    }
}
