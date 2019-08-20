<?php

use App\Etablissement;
use Illuminate\Database\Seeder;

class EtablissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $etablissement = new Etablissement();
        $etablissement->nom = 'Principale ABC SM';
        $etablissement->description = 'Administrateur des établissement';
        $etablissement->type = 'Aucun , tout role';
        $etablissement->nbPeriodesAnnee = 0;
        $etablissement->methodeCalculMoyennes = 0;
        try {
            $etablissement->dateCreation = new DateTime();
        } catch (Exception $e) {

        }
        $etablissement->save();
    }
}
