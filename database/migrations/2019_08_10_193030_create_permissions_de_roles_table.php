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
            $table->bigInteger('idPermission')->nullable(false);
            $table->bigInteger('idRole')->nullable(false);
            $table->foreign('idRole')->references('idRole')->on('role');
            $table->foreign('idPermission')->references('idPermission')->on('permission');
            $table->primary(['idPermission','idRole']);
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
