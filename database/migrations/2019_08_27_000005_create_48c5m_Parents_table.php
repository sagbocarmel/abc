<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MParentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Parents';

    /**
     * Run the migrations.
     * @table 48c5m_Parents
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('nom', 45);
            $table->string('prenoms', 45);
            $table->char('sexe');
            $table->string('email', 45)->nullable();
            $table->unsignedInteger('tel')->nullable(false)->primary();
            $table->unsignedInteger('tel2')->nullable();
            $table->string('langueLocale', 45)->nullable();
            $table->string('profession', 45)->nullable();
            $table->string('password', 100);
            $table->binary('photo')->nullable();
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
