<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MNiveauTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Niveau';

    /**
     * Run the migrations.
     * @table 48c5m_Niveau
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->char('niveau')->nullable(false);
            $table->string('codeEtablissement', 45)->nullable(false);
            $table->unsignedInteger('periodesAnnee');
            $table->unsignedInteger('methodeCalculMoyennes');
            $table->time('heureDebutCours');
            $table->time('heureFinCours');

            $table->index(["codeEtablissement"], 'fk_48c5m_Niveau_48c5m_Etablissement1_idx');


            $table->foreign('codeEtablissement', 'fk_48c5m_Niveau_48c5m_Etablissement1_idx')
                ->references('numeroAutorisation')->on('48c5m_Etablissement')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->primary(['niveau','codeEtablissement']);
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
