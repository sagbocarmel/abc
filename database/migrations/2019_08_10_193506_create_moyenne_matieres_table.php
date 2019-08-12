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
        Schema::create('moyenne_matieres', function (Blueprint $table) {
            $table->bigIncrements('idMoyenneMatiere')->nullable(false);
            $table->string('periode',45)->nullable(false);
            $table->float('moyenneComposition')->nullable(false);
            $table->float('moyenneDevoir')->nullable(false);
            $table->float('moyenneInterrogation')->nullable(false);
            $table->float('moyenneInterroDevoirs')->nullable(false);
            $table->float('moyenneMatiere')->nullable(false);
            $table->bigInteger('idClasse')->nullable(false);
            $table->bigInteger('idMatiere')->nullable(false);
            $table->bigInteger('idEleve')->nullable(false);
            $table->foreign('idClasse')->references('idClasse')->on('classe');
            $table->foreign('idMatiere')->references('idMatiere')->on('matiere');
            $table->foreign('idEleve')->references('idEleve')->on('eleve');
            $table->primary('idMoyenneMatiere');
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
