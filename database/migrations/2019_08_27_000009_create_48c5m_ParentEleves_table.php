<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MParentelevesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_ParentEleves';

    /**
     * Run the migrations.
     * @table 48c5m_ParentEleves
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('telParent')->nullable(false);
            $table->string('matriculeEleve', 45)->nullable(false);
            $table->string('titre', 45);

            $table->index(["telParent"], 'fk_48c5m_Parents_has_48c5m_Eleve_48c5m_Parents1_idx');

            $table->index(["matriculeEleve"], 'fk_48c5m_Parents_has_48c5m_Eleve_48c5m_Eleve1_idx');


            $table->foreign('telParent', 'fk_48c5m_Parents_has_48c5m_Eleve_48c5m_Parents1_idx')
                ->references('tel')->on('48c5m_Parents')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('matriculeEleve', 'fk_48c5m_Parents_has_48c5m_Eleve_48c5m_Eleve1_idx')
                ->references('matriculeEleve')->on('48c5m_Eleve')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->primary(['telParent', 'matriculeEleve']);
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
