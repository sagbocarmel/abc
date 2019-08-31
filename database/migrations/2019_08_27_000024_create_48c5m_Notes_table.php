<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MNotesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Notes';

    /**
     * Run the migrations.
     * @table 48c5m_Notes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('codeEtablissement',45)->nullable(false);
            $table->string('codeAnnee', 9)->nullable(false);
            $table->string('codeMatiere', 45)->nullable(false);
            $table->string('codeEvaluation', 45)->nullable(false);
            $table->char('niveau')->nullable(false);
            $table->string('codeClasse', 45)->nullable(false);
            $table->string('periode', 45)->nullable(false);
            $table->string('matriculeEleve', 45)->nullable(false);
            $table->float('note');
            $table->dateTime('dateNote');

            $table->index(["matriculeEleve"], 'fk_48c5m_Evaluation_has_48c5m_Eleve_48c5m_Eleve1_idx');
            $table->foreign(['codeEtablissement','niveau' ,'codeAnnee', 'codeClasse', 'codeMatiere', 'codeEvaluation','periode'],'idEvaluation')->references(['codeEtablissement','niveau' ,'codeAnnee', 'codeClasse', 'codeMatiere', 'codeEvaluation','periode'])->on('48c5m_Evaluation');
            $table->foreign('matriculeEleve', 'fk_48c5m_Evaluation_has_48c5m_Eleve_48c5m_Eleve1_idx')
                ->references('matriculeEleve')->on('48c5m_Eleve')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->timestamps();
            $table->primary(['codeEtablissement','codeAnnee','codeMatiere','codeEvaluation', 'periode', 'matriculeEleve'], 'idNotes');
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
