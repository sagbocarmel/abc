<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppreciationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('48c5m_appreciations', function (Blueprint $table) {
            $table->unsignedBigInteger('idEvaluation')->nullable(false);
            $table->unsignedBigInteger('idEleve')->nullable(false);
            $table->string('matricule',45)->nullable(false);
            $table->foreign('idEvaluation')->references('id')->on('48c5m_evaluations');
            $table->foreign('matricule')->references('matricule')->on('48c5m_eleves');
            $table->foreign('idEleve')->references('id')->on('48c5m_eleves');
            $table->string('appreciation',45)->nullable(false);
            $table->primary(['idEvaluation','idEleve','matricule']);
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
        Schema::dropIfExists('appreciations');
    }
}
