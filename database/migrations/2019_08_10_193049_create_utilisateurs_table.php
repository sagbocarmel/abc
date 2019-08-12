<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->bigIncrements('idUtilisateur')->nullable(false);
            $table->string('nom', 45)->nullable(false);
            $table->string('prenoms',100)->nullable(false);
            $table->char('sexe')->nullable(false);
            $table->string('email',45)->nullable(true);
            $table->string('tel1',15)->nullable(true);
            $table->string('tel2',15)->nullable(true);
            $table->string('password',100)->nullable(false);
            $table->bigInteger('idRole')->nullable(false);
            $table->foreign('idRole')->references('idRole')->on('role');
            $table->primary('idUtilisateur');
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
        Schema::dropIfExists('utilisateurs');
    }
}
