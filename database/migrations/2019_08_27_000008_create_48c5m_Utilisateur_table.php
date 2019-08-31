<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MUtilisateurTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Utilisateur';

    /**
     * Run the migrations.
     * @table 48c5m_Utilisateur
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('codeEtablissement', 45)->nullable(false);
            $table->string('nom', 45);
            $table->string('prenoms', 45);
            $table->char('sexe');
            $table->string('email', 45)->nullable(false)->unique();
            $table->unsignedInteger('tel')->nullable(false);
            $table->unsignedInteger('tel2')->nullable();
            $table->string('password', 100);
            $table->binary('photo')->nullable();
            $table->rememberToken();
            $table->index(["codeEtablissement"], 'fk_48c5m_Utilisateur_48c5m_Etablissement1_idx');


            $table->foreign('codeEtablissement', 'fk_48c5m_Utilisateur_48c5m_Etablissement1_idx')
                ->references('numeroAutorisation')->on('48c5m_Etablissement')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->primary(['codeEtablissement','tel']);
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
