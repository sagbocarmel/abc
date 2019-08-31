<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MMatieresdeclassesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_MatieresDeClasses';

    /**
     * Run the migrations.
     * @table 48c5m_MatieresDeClasses
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
            $table->string('matriculeEnseignant', 45)->nullable(false);
            $table->integer('coefficient')->default('1');



            $table->index(["codeEtablissement"], 'fk_48c5m_MatieresDeClasses_48c5m_Etablissement1_idx');

            $table->index(["matriculeEnseignant"], 'fk_48c5m_Matiere_has_48c5m_Classe_48c5m_Enseignant1_idx');

            $table->index(["codeAnnee"], 'fk_48c5m_MatieresDeClasses_AnneeScolaire1_idx');

            $table->index(["codeMatiere"], 'fk_48c5m_Matiere_has_48c5m_Classe_48c5m_Matiere1_idx');

            $table->foreign(['codeEtablissement','niveau','codeClasse'], 'idClasse')->references(['codeEtablissement','niveau','codeClasse'])->on('48c5m_Classe');

            $table->foreign('codeMatiere', 'fk_48c5m_Matiere_has_48c5m_Classe_48c5m_Matiere1_idx')
                ->references('codeMatiere')->on('48c5m_Matiere')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('matriculeEnseignant', 'fk_48c5m_Matiere_has_48c5m_Classe_48c5m_Enseignant1_idx')
                ->references('matriculeEnseignant')->on('48c5m_Enseignant')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('codeAnnee', 'fk_48c5m_MatieresDeClasses_AnneeScolaire1_idx')
                ->references('codeAnnee')->on('48c5m_AnneeScolaire')
                ->onDelete('no action')
                ->onUpdate('no action');


            $table->primary(['codeEtablissement', 'codeAnnee', 'niveau', 'codeClasse', 'codeMatiere'], 'idMatiereClasse');
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
       Schema::dropIfExists($this->tableName);
     }
}
