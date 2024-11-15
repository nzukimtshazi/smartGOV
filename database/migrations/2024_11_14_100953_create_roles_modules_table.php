<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('roles_modules')) {
            Schema::create('roles_modules', function (Blueprint $table) {
                $table->id();
                $table->boolean('createAccess')->default(false);
                $table->boolean('readAccess')->default(false);
                $table->boolean('updateAccess')->default(false);
                $table->boolean('deleteAccess')->default(false);
                $table->boolean('authorizeAccess')->default(false);
                $table->boolean('settingsAccess')->default(false);
                $table->boolean('reportAccess')->default(false);
                $table->boolean('addUserAccess')->default(false);
                $table->bigInteger('role_id')->unsigned();
                $table->bigInteger('module_id')->unsigned();
                $table->timestamps();
            });
            Schema::table('roles_modules', function ($table) {
                $table->foreign('role_id')->references('id')->on('roles');
                $table->foreign('module_id')->references('id')->on('module');
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
        Schema::dropIfExists('roles_modules');
    }
}
