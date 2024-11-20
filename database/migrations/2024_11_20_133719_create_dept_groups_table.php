<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeptGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dept_groups')) {
            Schema::create('dept_groups', function (Blueprint $table) {
                $table->id();
                $table->string('reference');
                $table->bigInteger('dept_id')->unsigned();
                $table->bigInteger('group_id')->unsigned();
                $table->bigInteger('user_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('dept_groups', function ($table) {
                $table->foreign('dept_id')->references('id')->on('departments');
                $table->foreign('group_id')->references('id')->on('groups');
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
        Schema::dropIfExists('dept_groups');
    }
}
