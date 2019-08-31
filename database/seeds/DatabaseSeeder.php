<?php

use App\PermissionsDeRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AnneeScolaireSeeder::class);
        $this->call(EtablissementSeeder::class);
        $this->call(ElementSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(DroitsSeeder::class);
        //$this->call(ProfileSeeder::class);
    }
}
