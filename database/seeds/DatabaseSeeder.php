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
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionsDeRolesTableSeeder::class);
        $this->call(EtablissementSeeder::class);
        $this->call(ProfileSeeder::class);
    }
}
