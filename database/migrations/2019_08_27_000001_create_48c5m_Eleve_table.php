<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MEleveTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Eleve';

    /**
     * Run the migrations.
     * @table 48c5m_Eleve
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('matriculeEleve',45)->nullable(false)->unique();
            $table->string('nom', 45);
            $table->string('prenoms', 45);
            $table->char('sexe');
            $table->string('email', 45)->nullable();
            $table->unsignedInteger('tel')->nullable();
            $table->unsignedInteger('tel2')->nullable();
            $table->date('dateNaissance')->nullable();
            $table->string('lieuNaissance', 45)->nullable();
            $table->string('nationalite', 45)->nullable();
            $table->string('adresse')->nullable();
            $table->binary('photo')->nullable();
            $table->string('infoSup')->nullable();
            $table->primary('matriculeEleve');
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
