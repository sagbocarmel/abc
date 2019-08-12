<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoyennePeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moyenne_periodes', function (Blueprint $table) {
            $table->bigIncrements('idMoyennePeriode')->nullable(false);
            $table->bigInteger('idClasse')->nullable(false);
            $table->bigInteger('idEleve')->nullable(false);
            $table->foreign('idEleve')->references('idEleve')->on('eleve');
            $table->float('moyenne')->nullable(false);
            $table->foreign('idClasse')->references('idClasse')->on('classe');
            $table->string('mention',45)->nullable(true);
            $table->primary('idMoyennePeriode');
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
        Schema::dropIfExists('moyenne_periodes');
    }
}
