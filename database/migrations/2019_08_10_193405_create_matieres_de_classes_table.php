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
            $table->unsignedBigInteger('idClasse')->nullable(false);
            $table->unsignedBigInteger('idMatiere')->nullable(false);
            $table->unsignedBigInteger('idEnseignant')->nullable(false);
            $table->foreign('idMatiere')->references('id')->on('matieres');
            $table->foreign('idClasse')->references('id')->on('classes');
            $table->foreign('idEnseignant')->references('id')->on('enseignants');
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
