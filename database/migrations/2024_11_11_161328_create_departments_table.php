<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('departments')) {
            Schema::create('departments', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('no_of_beds');
                $table->integer('beds_available');
                $table->integer('beds_occupied');
                $table->string('occupancy_rate');
                $table->string('reference');
                $table->bigInteger('institution_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('departments', function ($table) {
                $table->foreign('institution_id')->references('id')->on('institutions');
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
        Schema::dropIfExists('departments');
    }
}
