<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnseignantClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('48c5m_enseignant_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('idClasse')->nullable(false);
            $table->unsignedBigInteger('idEnseignant')->nullable(false);
            $table->foreign('idClasse')->references('id')->on('48c5m_classes');
            $table->foreign('idEnseignant')->references('id')->on('48c5m_enseignants');
            $table->primary(['idClasse','idEnseignant']);
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
        Schema::dropIfExists('enseignant_classes');
    }
}
