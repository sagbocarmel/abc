<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('48c5m_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom',45)->nullable(false);
            $table->string('description',255)->nullable(true);
            $table->string('section',45)->nullable(true);
            $table->char('serie')->nullable(true);
            $table->unsignedBigInteger('idSection')->nullable(false);
            $table->foreign('idSection')->references('id')->on('48c5m_sections');
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
        Schema::dropIfExists('classes');
    }
}
