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
        Schema::create('48c5m_evaluations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre',45)->nullable(false);
            $table->string('type',45)->nullable(false);
            $table->date('date')->nullable(false);
            $table->bigInteger('duree')->nullable(false);
            $table->string('periode',45)->nullable(false);
            $table->unsignedBigInteger('idClasse')->nullable(false);
            $table->unsignedBigInteger('idMatiere')->nullable(false);
            $table->foreign('idClasse')->references('id')->on('48c5m_classes');
            $table->foreign('idMatiere')->references('id')->on('48c5m_matieres');
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
