<?php

use App\Models\Niveau;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveau_scolaire = new Niveau();
        $niveau_scolaire->niveau = 'Secondaire';
        $niveau_scolaire->codeEtablissement = 'ABCSMPRINCIPALSCHOOL20192018LPHAPLATFORMEDATA';
        $niveau_scolaire->periodesAnnee = 'Semestre 1';
        $niveau_scolaire->methodeCalculMoyennes = '1';
        $date = Carbon::now();
        $date->hour(8);
        $niveau_scolaire->heureDebutCours = $this->getBeginAtAttribute($date);
        $date->hour(19);
        $niveau_scolaire->heureFinCours = $this->getBeginAtAttribute($date);
        $niveau_scolaire->save();
    }

    public function getBeginAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('hh:mm');
    }
}
