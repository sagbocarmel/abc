<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoyenneAnnuellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moyenne_annuelles', function (Blueprint $table) {
            $table->bigIncrements('idMoyenneAnnuelle');
            $table->bigInteger('idClasse')->nullable(false);
            $table->bigInteger('idEleve')->nullable(false);
            $table->string('periode',45)->nullable(false);
            $table->float('moyenne')->nullable(false);
            $table->string('mention',45)->nullable(true);
            $table->string('decision',45)->nullable(true);
            $table->foreign('idEleve')->references('idEleve')->on('eleve');
            $table->foreign('idClasse')->references('idClasse')->on('classe');
            $table->primary('idMoyenneAnnuelle');
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
        Schema::dropIfExists('moyenne_annuelles');
    }
}
