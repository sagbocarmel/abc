<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MClasseTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Classe';

    /**
     * Run the migrations.
     * @table 48c5m_Classe
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('codeEtablissement',45)->nullable(false);
            $table->char('niveau')->nullable(false);
            $table->string('codeClasse', 45)->nullable(false);
            $table->string('anneEtude', 45)->nullable(false);
            $table->string('serie', 45)->nullable();
            $table->string('codeSection', 5)->nullable();


            $table->foreign(['niveau','codeEtablissement'])
                ->references(['niveau','codeEtablissement'])->on('48c5m_Niveau')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->primary(['codeEtablissement','niveau','codeClasse'], 'idClasse');
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
