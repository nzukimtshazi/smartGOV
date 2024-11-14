<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationalSupportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('operational_support')) {
            Schema::create('operational_support', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('count');
                $table->bigInteger('district_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('operational_support', function ($table) {
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
        Schema::dropIfExists('operational_support');
    }
}
