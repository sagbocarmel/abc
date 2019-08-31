<?php


use App\Models\Etablissement;
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
        $etablissement->numeroAutorisation = 'ABCSMPRINCIPALSCHOOL20192018LPHAPLATFORMEDATA';
        $etablissement->nom = 'Principale ABC SM';
        $etablissement->description = 'Administrateur des établissement';
        $etablissement->type = 'Aucun, tout role';
        $etablissement->statut = 'Etablissement fictif de managment générale';
        $etablissement->adresse = 'abc.futurix.tech';
        $etablissement->tel = 67811382;

        try {
            $etablissement->dateCreation = new DateTime();
        } catch (Exception $e) {

        }
        $etablissement->save();
    }
}
