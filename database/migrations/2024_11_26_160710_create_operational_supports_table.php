<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationalSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('operational_supports')) {
            Schema::create('operational_supports', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('count');
                $table->string('reference');
                $table->bigInteger('district_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('operational_supports', function ($table) {
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
        Schema::dropIfExists('operational_supports');
    }
}
