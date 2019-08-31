<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MInscriptionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Inscription';

    /**
     * Run the migrations.
     * @table 48c5m_Inscription
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('codeEtablissement',45)->nullable(false);
            $table->char('niveau')->nullable(false);
            $table->string('codeClasse', 45)->nullable(false);
            $table->string('codeAnnee', 9)->nullable(false);
            $table->string('matriculeEleve', 45)->nullable(false);
            $table->date('dateInscription')->nullable(false);


            $table->index(["matriculeEleve"], 'fk_Inscription_48c5m_Eleve1_idx');

            $table->index(["codeAnnee"], 'fk_Inscription_AnneeScolaire1_idx');

            $table->foreign(['codeEtablissement','niveau','codeClasse'], 'idClasses')->references(['codeEtablissement','niveau','codeClasse'])->on('48c5m_Classe');

            $table->foreign('matriculeEleve', 'fk_Inscription_48c5m_Eleve1_idx')
                ->references('matriculeEleve')->on('48c5m_Eleve')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('codeAnnee', 'fk_Inscription_AnneeScolaire1_idx')
                ->references('codeAnnee')->on('48c5m_AnneeScolaire')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->primary(['codeEtablissement', 'niveau', 'codeClasse','codeAnnee', 'matriculeEleve'], 'idInscription');
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
