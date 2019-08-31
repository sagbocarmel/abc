<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MCoursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Cours';

    /**
     * Run the migrations.
     * @table 48c5m_Cours
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('codeEtablissement',45)->nullable(false);
            $table->char('niveau')->nullable(false);
            $table->string('codeAnnee', 9)->nullable(false);
            $table->string('codeClasse', 45)->nullable(false);
            $table->string('codeMatiere', 45)->nullable(false);
            $table->string('jourCours',9)->nullable(false);
            $table->time('heureDebut');
            $table->time('heureFin');

            $table->index(["codeAnnee"], 'fk_48c5m_Cours_48c5m_AnneeScolaire1_idx');

            $table->foreign(['codeEtablissement','niveau','codeClasse'], 'idClasseCours')->references(['codeEtablissement','niveau','codeClasse'])->on('48c5m_Classe');

            $table->foreign('codeAnnee', 'fk_48c5m_Cours_48c5m_AnneeScolaire1_idx')
                ->references('codeAnnee')->on('48c5m_AnneeScolaire')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->timestamps();
            $table->primary(['codeEtablissement','niveau', 'codeClasse','codeAnnee',  'codeMatiere', 'jourCours'], 'idCours');
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
