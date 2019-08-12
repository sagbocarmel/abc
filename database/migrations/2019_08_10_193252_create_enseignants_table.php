<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->bigIncrements('idEnseignant')->nullable(false);
            $table->string('nom',45)->nullable(false);
            $table->string('prenoms',100)->nullable(false);
            $table->char('sexe')->nullable(false);
            $table->string('email',45)->nullable(true);
            $table->string('tel1',15)->nullable(false);
            $table->string('tel2',15)->nullable(true);
            $table->string('password',100)->nullable(false);
            $table->date('dateNaissance')->nullable(true);
            $table->string('adresse',255)->nullable(true);
            $table->string('nationalite',45)->nullable(true);
            $table->string('photo',255)->nullable(true);
            $table->string('infoSup',255)->nullable(true);
            $table->string('contactUrgence',45)->nullable(true);
            $table->string('mode',25)->nullable(true);
            $table->string('cv',255)->nullable(true);
            $table->bigInteger('idUtilisateur')->nullable(false);
            $table->foreign('idUtilisateur')->references('idUtilisateur')->on('Utilisateur');
            $table->primary('idEnseignement');
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
        Schema::dropIfExists('enseignants');
    }
}
