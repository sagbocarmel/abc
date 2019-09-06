<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MAnneescolaireetablissementTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_AnneeScolaireEtablissement';

    /**
     * Run the migrations.
     * @table AnneeScolaireEtablissement
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('codeEtablissement',45)->nullable(false);
            $table->string('codeAnnee', 9)->nullable(false);
            $table->dateTime('dateFermeture')->nullable(true);
            $table->integer('statut')->default('1');

            $table->index(["codeEtablissement"], 'fk_48c5m_Etablissement_has_48c5m_AnneeScolaire_48c5m_Etabli_idx');

            $table->index(["codeAnnee"], 'fk_48c5m_Etablissement_has_48c5m_AnneeScolaire_48c5m_AnneeS_idx');


            $table->foreign('codeEtablissement', 'fk_48c5m_Etablissement_has_48c5m_AnneeScolaire_48c5m_Etabli_idx')
                ->references('numeroAutorisation')->on('48c5m_Etablissement')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('codeAnnee', 'fk_48c5m_Etablissement_has_48c5m_AnneeScolaire_48c5m_AnneeS_idx')
                ->references('codeAnnee')->on('48c5m_AnneeScolaire')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->timestamps();
            $table->primary(['codeEtablissement','codeAnnee'], 'id');
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
