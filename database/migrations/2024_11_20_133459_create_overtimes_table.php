<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvertimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('overtimes')) {
            Schema::create('overtimes', function (Blueprint $table) {
                $table->id();
                $table->string('type');
                $table->integer('count');
                $table->string('reference');
                $table->bigInteger('district_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('overtimes', function ($table) {
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
        Schema::dropIfExists('overtimes');
    }
}
