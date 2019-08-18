<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsDeRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions_de_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('idPermission')->nullable(false);
            $table->unsignedBigInteger('idRole')->nullable(false);
            $table->foreign('idRole')->references('id')->on('roles');
            $table->foreign('idPermission')->references('id')->on('permissions');
            $table->primary(['idPermission','idRole'],'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions_de_roles');
    }
}
