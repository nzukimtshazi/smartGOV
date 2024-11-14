<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('complaints')) {
            Schema::create('complaints', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('telephoneNo');
                $table->string('mobileNo');
                $table->string('email');
                $table->string('caller_type');
                $table->string('company');
                $table->string('contact_person');
                $table->string('location');
                $table->string('complaint_type');
                $table->string('additional_info');
                $table->string('reference');
                $table->bigInteger('district_id')->unsigned();
                $table->bigInteger('user_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('complaints', function ($table) {
                $table->foreign('district_id')->references('id')->on('districts');
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
        Schema::dropIfExists('complaints');
    }
}
