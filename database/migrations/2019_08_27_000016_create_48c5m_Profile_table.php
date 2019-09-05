<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MProfileTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Profile';

    /**
     * Run the migrations.
     * @table 48c5m_Profile
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('codeEtablissement', 45)->nullable(false);
            $table->unsignedInteger('telUtilisateur')->nullable(false);
            $table->string('codeRole', 45)->nullable(false);
            $table->char('niveau');

            $table->index(["codeEtablissement", "telUtilisateur"], 'fk_48c5m_Profile_48c5m_Utilisateur1_idx');

            $table->index(["niveau"], 'fk_48c5m_Profile_48c5m_Niveau1_idx');

            $table->index(["codeRole"], 'fk_48c5m_Role_has_48c5m_Etablissement_48c5m_Role1_idx');


            $table->foreign('codeRole', 'fk_48c5m_Role_has_48c5m_Etablissement_48c5m_Role1_idx')
                ->references('codeRole')->on('48c5m_Role')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('niveau', 'fk_48c5m_Profile_48c5m_Niveau1_idx')
                ->references('niveau')->on('48c5m_Niveau')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign(['codeEtablissement','telUtilisateur'], 'fk_48c5m_Profile_48c5m_Utilisateur1_idx')
                ->references(['codeEtablissement','tel'])->on('48c5m_UtilisateurEtablissement')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->primary(['codeEtablissement', 'telUtilisateur'], 'idProfile');
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
