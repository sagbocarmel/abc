<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('48c5m_Sections', function (Blueprint $table) {
            $table->string('codeEtablissement',45)->nullable(false);
            $table->string('titre',45)->nullable(false);
            $table->string('description',255)->nullable(true);
            $table->timestamps();
            $table->foreign('codeEtablissement')->references('numeroAutorisation')->
                on('48c5m_Etablissement');
            $table->primary(['codeEtablissement','titre'], 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
