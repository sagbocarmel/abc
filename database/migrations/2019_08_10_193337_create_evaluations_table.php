<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->bigIncrements('idEvaluation')->nullable(false);
            $table->string('titre',45)->nullable(false);
            $table->string('type',45)->nullable(false);
            $table->date('date')->nullable(false);
            $table->bigInteger('duree')->nullable(false);
            $table->string('periode',45)->nullable(false);
            $table->bigInteger('idClasse')->nullable(false);
            $table->bigInteger('idMatiere')->nullable(false);
            $table->foreign('idClasse')->references('idClasse')->on('classe');
            $table->foreign('idMatiere')->references('idMatiere')->on('matiere');
            $table->primary('idEvaluation');
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
        Schema::dropIfExists('evaluations');
    }
}
