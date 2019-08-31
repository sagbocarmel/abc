<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MDroitsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Droits';

    /**
     * Run the migrations.
     * @table 48c5m_Droits
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('codeRole',45)->nullable(false);
            $table->string('codeElement', 45)->nullable(false);
            $table->char('droit')->nullable(false);

            $table->index(["codeRole"], 'fk_Role_has_Permission_Role1_idx');

            $table->index(["codeElement"], 'fk_Role_has_Permission_Permission1_idx');


            $table->foreign('codeRole', 'fk_Role_has_Permission_Role1_idx')
                ->references('codeRole')->on('48c5m_Role')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('codeElement', 'fk_Role_has_Permission_Permission1_idx')
                ->references('codeElement')->on('48c5m_Element')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->primary(['codeRole', 'codeElement', 'droit']);
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
