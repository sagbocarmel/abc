<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->bigIncrements('idEleve')->nullable(false);
            $table->string('nom',45)->nullable(false);
            $table->string('prenoms',100)->nullable(false);
            $table->char('sexe')->nullable(false);
            $table->string('email',45)->nullable(true);
            $table->string('tel1',15)->nullable(true);
            $table->string('tel2',15)->nullable(true);
            $table->string('password',100)->nullable(false);
            $table->date('dateNaissance')->nullable(true);
            $table->string('adresse',255)->nullable(true);
            $table->string('nationalite',45)->nullable(true);
            $table->string('photo',255)->nullable(true);
            $table->string('infoSup',255)->nullable(true);
            $table->string('contactUrgence',45)->nullable(true);
            $table->string('',25)->nullable(true);
            $table->string('matricule',255)->nullable(false);
            $table->bigInteger('idUtilisateur')->nullable(false);
            $table->bigInteger('idClasse')->nullable(false);
            $table->foreign('idUtilisateur')->references('idUtilisateur')->on('utilisateur');
            $table->foreign('idClasse')->references('idClasse')->on('classe');
            $table->primary('idEleve');
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
        Schema::dropIfExists('eleves');
    }
}
