<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenericCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('generic_calls')) {
            Schema::create('generic_calls', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('telephoneNo');
                $table->string('mobileNo');
                $table->string('email');
                $table->string('call_type');
                $table->string('institution_type');
                $table->string('call_status');
                $table->string('reference');
                $table->bigInteger('district_id')->unsigned();
                $table->bigInteger('institution_id')->unsigned();
                $table->bigInteger('user_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('generic_calls', function ($table) {
                $table->foreign('district_id')->references('id')->on('districts');
                $table->foreign('institution_id')->references('id')->on('institutions');
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
        Schema::dropIfExists('generic_calls');
    }
}
