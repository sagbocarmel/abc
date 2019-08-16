<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->unsignedBigInteger('idEleve')->nullable(false);
            $table->unsignedBigInteger('idEvaluation')->nullable(false);
            $table->foreign('idEleve')->references('id')->on('eleves');
            $table->foreign('idEvaluation')->references('id')->on('evaluations');
            $table->float('notes')->nullable(false);
            $table->primary(['idEleve','idEvaluation']);
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
        Schema::dropIfExists('notes');
    }
}
