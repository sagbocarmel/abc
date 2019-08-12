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
            $table->bigInteger('idEleve')->nullable(false);
            $table->bigInteger('idEvaluation')->nullable(false);
            $table->foreign('idEleve')->references('idEleve')->on('eleve');
            $table->foreign('idEvaluation')->references('idEvaluation')->on('evaluation');
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
