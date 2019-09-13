<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MEnseignantclasseTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_EnseignantClasse';

    /**
     * Run the migrations.
     * @table 48c5m_EnseignantClasse
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('codeEtablissement', 45)->nullable(false);
            $table->string('matriculeEnseignant', 45)->nullable(false);
            $table->string('codeClasse', 45)->nullable(false);
            $table->char('niveau')->nullable(false);

            $table->index(["matriculeEnseignant"], 'fk_48c5m_Enseignant_has_48c5m_Classe_48c5m_Enseignant1_idx');

            $table->foreign(['codeEtablissement','niveau','codeClasse'], 'idClassesEns')->references(['codeEtablissement','niveau','codeClasse'])->on('48c5m_Classe');

            $table->foreign('matriculeEnseignant', 'fk_48c5m_Enseignant_has_48c5m_Classe_48c5m_Enseignant1_idx')
                ->references('matriculeEnseignant')->on('48c5m_Enseignant')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->timestamps();
            $table->primary(['codeEtablissement', 'matriculeEnseignant', 'codeClasse', 'niveau'], 'idEnseignantClasse');
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
