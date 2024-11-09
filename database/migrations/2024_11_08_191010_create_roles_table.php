<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('description');
                $table->boolean('createAccess')->default(false);
                $table->boolean('readAccess')->default(true);
                $table->boolean('updateAccess')->default(false);
                $table->boolean('deleteAccess')->default(false);
                $table->boolean('authorizeAccess')->default(false);
                $table->boolean('settingsAccess')->default(false);
                $table->boolean('reportAccess')->default(false);
                $table->boolean('addUserAccess')->default(false);
                $table->timestamps();
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
        Schema::dropIfExists('roles');
    }
}
