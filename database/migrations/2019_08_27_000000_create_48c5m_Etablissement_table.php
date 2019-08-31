<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MEtablissementTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Etablissement';

    /**
     * Run the migrations.
     * @table 48c5m_Etablissement
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('numeroAutorisation',45)->nullable(false)->unique();
            $table->string('nom', 50);
            $table->binary('logo')->nullable();
            $table->text('description')->nullable();
            $table->string('type', 45);
            $table->string('statut', 45);
            $table->string('adresse', 45);
            $table->string('bp', 45)->nullable();
            $table->unsignedInteger('tel');
            $table->string('email', 45)->nullable();
            $table->date('dateCreation');
            $table->primary('numeroAutorisation');
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
