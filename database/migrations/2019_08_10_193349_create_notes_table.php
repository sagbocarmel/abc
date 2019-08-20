<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('48c5m_notes', function (Blueprint $table) {
            $table->unsignedBigInteger('idEleve')->nullable(false);
            $table->unsignedBigInteger('idEvaluation')->nullable(false);
            $table->string('matriculeEleve',45)->nullable(false);
            $table->foreign('idEvaluation')->references('id')->on('48c5m_evaluations');
            $table->foreign('idEleve')->references('id')->on('48c5m_eleves');
            $table->foreign('matriculeEleve')->references('matricule')->on('48c5m_eleves');
            $table->float('notes')->nullable(false);
            $table->primary(['idEleve','idEvaluation','matriculeEleve']);
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
        Schema::dropIfExists('notes');
    }
}
