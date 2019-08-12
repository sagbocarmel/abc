<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatieresDeClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres_de_classes', function (Blueprint $table) {
            $table->bigInteger('idClasse')->nullable(false);
            $table->bigInteger('idMatiere')->nullable(false);
            $table->bigInteger('idEnseignant')->nullable(false);
            $table->foreign('idMatiere')->references('idMatiere')->on('matiere');
            $table->foreign('idClasse')->references('idClasse')->on('classe');
            $table->foreign('idEnseignant')->references('idEnseignant')->on('enseignant');
            $table->primary(['idClasse','idMatiere']);
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
        Schema::dropIfExists('matieres_de_classes');
    }
}
