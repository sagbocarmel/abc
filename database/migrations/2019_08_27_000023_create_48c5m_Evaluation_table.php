<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MEvaluationTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Evaluation';

    /**
     * Run the migrations.
     * @table 48c5m_Evaluation
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('codeEtablissement',45)->nullable(false);
            $table->string('codeAnnee', 9)->nullable(false);
            $table->char('niveau')->nullable(false);
            $table->string('codeClasse', 45)->nullable(false);
            $table->string('codeMatiere', 45)->nullable(false);
            $table->string('codeEvaluation', 45)->nullable(false);
            $table->string('periode', 45);
            $table->string('type', 45);
            $table->date('date');
            $table->unsignedInteger('duree');

            $table->index(["codeAnnee"], 'fk_48c5m_Evaluation_AnneeScolaire1_idx');

            $table->foreign(['codeEtablissement','niveau','codeClasse'], 'idClasseEval')->references(['codeEtablissement','niveau','codeClasse'])->on('48c5m_Classe');

            $table->foreign('codeAnnee', 'fk_48c5m_Evaluation_AnneeScolaire1_idx')
                ->references('codeAnnee')->on('48c5m_AnneeScolaire')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->timestamps();
            $table->primary(['codeEtablissement','niveau' ,'codeAnnee', 'codeClasse', 'codeMatiere', 'codeEvaluation','periode'],'idEvaluation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
