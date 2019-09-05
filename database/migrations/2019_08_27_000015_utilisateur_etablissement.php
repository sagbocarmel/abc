<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UtilisateurEtablissement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('48c5m_UtilisateurEtablissement', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('codeEtablissement', 45)->nullable(false);
            $table->unsignedInteger('tel')->nullable(false);
            $table->index(["codeEtablissement"], 'fk_48c5m_Utilisateur_48c5m_Etablissement1_idx');

            $table->foreign('tel')
                ->references('tel')->on('48c5m_Utilisateur')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('codeEtablissement', 'fk_48c5m_Utilisateur_48c5m_Etablissement1_idx')
                ->references('numeroAutorisation')->on('48c5m_Etablissement')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->primary(['codeEtablissement','tel'],'id');
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
        //
    }
}
