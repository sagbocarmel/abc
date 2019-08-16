<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom', 45)->nullable(false);
            $table->string('prenoms',100)->nullable(false);
            $table->char('sexe')->nullable(false);
            $table->string('email',45)->nullable(true)->unique();
            $table->string('tel1',15)->nullable(true);
            $table->string('tel2',15)->nullable(true);
            $table->string('password',100)->nullable(false);
            $table->unsignedBigInteger('idRole');
            $table->timestamp('email_verified_at')->nullable();
            $table->foreign('idRole')->references('id')->on('roles');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
