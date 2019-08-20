<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $profil = new Profile();
        $profil->idRole = 8;
        $profil->idEtablissement = 1;
        $profil->save();
    }
}
