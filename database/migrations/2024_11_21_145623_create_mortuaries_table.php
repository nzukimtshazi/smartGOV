<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMortuariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('mortuaries')) {
            Schema::create('mortuaries', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('contactNo');
                $table->integer('mobileNo');
                $table->bigInteger('district_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('mortuaries', function ($table) {
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
        Schema::dropIfExists('mortuaries');
    }
}
