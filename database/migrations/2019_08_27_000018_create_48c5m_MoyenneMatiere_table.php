<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MMoyennematiereTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_MoyenneMatiere';

    /**
     * Run the migrations.
     * @table 48c5m_MoyenneMatiere
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('codeEtablissement', 45)->nullable(false);
            $table->string('codeAnnee', 9)->nullable(false);
            $table->string('codeMatiere', 45);
            $table->string('matriculeEleve', 45);
            $table->string('periode', 45);
            $table->float('moyenneComposition')->nullable();
            $table->float('moyenneDevoir')->nullable();
            $table->float('moyenneInterrogation')->nullable();
            $table->float('moyenneInterroDevoirs')->nullable();
            $table->float('moyenneMatiere')->nullable();

            $table->index(["codeEtablissement"], 'fk__48c5m_MoyenneMatiere_48c5m_Etablissement1_idx');

            $table->index(["codeMatiere"], 'fk_48c5m_MoyenneMatiere_48c5m_Matiere1_idx');

            $table->index(["matriculeEleve"], 'fk_48c5m_MoyenneMatiere_48c5m_Eleve1_idx');

            $table->index(["codeAnnee"], 'fk_48c5m_MoyenneMatiere_AnneeScolaire1_idx');

            $table->foreign('codeEtablissement', 'fk__48c5m_MoyenneMatiere_48c5m_Etablissement1_idx')
                ->references('numeroAutorisation')->on('48c5m_Etablissement')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('matriculeEleve', 'fk_48c5m_MoyenneMatiere_48c5m_Eleve1_idx')
                ->references('matriculeEleve')->on('48c5m_Eleve')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('codeAnnee', 'fk_48c5m_MoyenneMatiere_AnneeScolaire1_idx')
                ->references('codeAnnee')->on('48c5m_AnneeScolaire')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('codeMatiere', 'fk_48c5m_MoyenneMatiere_48c5m_Matiere1_idx')
                ->references('codeMatiere')->on('48c5m_Matiere')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->primary(['codeEtablissement', 'matriculeEleve', 'codeAnnee', 'codeMatiere'],'idMoyenneMatiere');
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
