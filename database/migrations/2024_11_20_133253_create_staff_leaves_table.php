<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('staff_leaves')) {
            Schema::create('staff_leaves', function (Blueprint $table) {
                $table->id();
                $table->string('description');
                $table->integer('count');
                $table->string('reference');
                $table->bigInteger('district_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('staff_leaves', function ($table) {
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
        Schema::dropIfExists('staff_leaves');
    }
}
