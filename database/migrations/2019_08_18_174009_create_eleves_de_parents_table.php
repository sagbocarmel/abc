<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElevesDeParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('48c5m_eleves_de_parents', function (Blueprint $table) {
            $table->unsignedBigInteger('idParent')->nullable(false);
            $table->unsignedBigInteger('idEleve')->nullable(false);
            $table->foreign('idParent')->references('id')->on('48c5m_parent_eleves');
            $table->foreign('idEleve')->references('id')->on('48c5m_eleves');
            $table->primary(['idParent','idEleve']);
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
        Schema::dropIfExists('eleves_de_parents');
    }
}
