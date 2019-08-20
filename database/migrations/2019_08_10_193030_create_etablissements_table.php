<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtablissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('48c5m_etablissements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom',50)->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('type',45)->nullable(false);
            $table->unsignedBigInteger('nbPeriodesAnnee')->nullable(false);
            $table->unsignedBigInteger('methodeCalculMoyennes')->nullable(false);
            $table->string('logo', 100)->nullable(true);
            $table->dateTime('dateCreation')->nullable(false);
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
        Schema::dropIfExists('etablissements');
    }
}
