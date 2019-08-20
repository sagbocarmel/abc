<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulletinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('48c5m_bulletins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idEleve')->nullable(false);
            $table->string('matricule',45)->nullable(false);
            $table->foreign('matricule')->references('matricule')->on('48c5m_eleves');
            $table->foreign('idEleve')->references('id')->on('48c5m_eleves');
            $table->unsignedBigInteger('idEtablissement')->nullable(false);
            $table->foreign('idEtablissement')->references('id')->on('48c5m_etablissements');
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
        Schema::dropIfExists('bulletins');
    }
}
