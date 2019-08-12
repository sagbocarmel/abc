<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtablissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->bigIncrements('idEtablissement')->nullable(false);
            $table->string('nom',50)->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('type',45)->nullable(false);
            $table->bigInteger('nbPeriodesAnnee')->nullable(false);
            $table->bigInteger('methodeCalculMoyennes')->nullable(false);
            $table->string('logo', 100)->nullable(true);
            $table->dateTime('dateCreation')->nullable(false);
            $table->primary('idEtablissement');
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
        Schema::dropIfExists('etablissements');
    }
}
