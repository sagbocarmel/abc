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
        Schema::create('48c5m_moyenne_periodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idClasse')->nullable(false);
            $table->unsignedBigInteger('idEleve')->nullable(false);
            $table->string('matricule',45)->nullable(false);
            $table->foreign('matricule')->references('matricule')->on('48c5m_eleves');
            $table->foreign('idEleve')->references('id')->on('48c5m_eleves');
            $table->float('moyenne')->nullable(false);
            $table->foreign('idClasse')->references('id')->on('48c5m_classes');
            $table->string('mention',45)->nullable(true);
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
