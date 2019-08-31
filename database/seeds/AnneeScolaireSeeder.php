<?php

use Illuminate\Database\Seeder;

class AnneeScolaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $annee_scolaire = new \App\Models\AnneeScolaire();
        $annee_scolaire->codeAnnee = '2018-2019';
        $annee_scolaire->save();
    }
}
