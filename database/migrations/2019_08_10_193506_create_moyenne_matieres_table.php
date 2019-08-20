<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoyenneMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('48c5m_moyenne_matieres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('periode',45)->nullable(false);
            $table->float('moyenneComposition')->nullable(false);
            $table->float('moyenneDevoir')->nullable(false);
            $table->float('moyenneInterrogation')->nullable(false);
            $table->float('moyenneInterroDevoirs')->nullable(false);
            $table->float('moyenneMatiere')->nullable(false);
            $table->unsignedBigInteger('idClasse')->nullable(false);
            $table->unsignedBigInteger('idMatiere')->nullable(false);
            $table->unsignedBigInteger('idEleve')->nullable(false);
            $table->string('matricule',45)->nullable(false);
            $table->foreign('matricule')->references('matricule')->on('48c5m_eleves');
            $table->foreign('idClasse')->references('id')->on('48c5m_classes');
            $table->foreign('idMatiere')->references('id')->on('48c5m_matieres');
            $table->foreign('idEleve')->references('id')->on('48c5m_eleves');
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
        Schema::dropIfExists('moyenne_matieres');
    }
}
