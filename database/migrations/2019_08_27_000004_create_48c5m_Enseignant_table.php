<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MEnseignantTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Enseignant';

    /**
     * Run the migrations.
     * @table 48c5m_Enseignant
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('matriculeEnseignant', 45)->unique()->nullable(false);
            $table->string('nom', 45);
            $table->string('prenoms', 45);
            $table->char('sexe');
            $table->string('email', 45)->nullable();
            $table->unsignedInteger('tel');
            $table->unsignedInteger('tel2')->nullable();
            $table->date('dateNaissance')->nullable();
            $table->string('nationalite', 45)->nullable();
            $table->string('adresse')->nullable();
            $table->binary('photo')->nullable();
            $table->string('infoSup')->nullable();
            $table->string('diplome', 45)->nullable();
            $table->string('contactUrgence', 45)->nullable();
            $table->string('mode', 45)->nullable();
            $table->binary('cv')->nullable();
            $table->primary('matriculeEnseignant');
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
