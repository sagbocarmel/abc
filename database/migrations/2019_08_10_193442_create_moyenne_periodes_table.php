<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoyennePeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moyenne_periodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idClasse')->nullable(false);
            $table->unsignedBigInteger('idEleve')->nullable(false);
            $table->foreign('idEleve')->references('id')->on('eleves');
            $table->float('moyenne')->nullable(false);
            $table->foreign('idClasse')->references('id')->on('classes');
            $table->string('mention',45)->nullable(true);
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
        Schema::dropIfExists('moyenne_periodes');
    }
}
