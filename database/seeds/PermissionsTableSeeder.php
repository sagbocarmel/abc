<?php

use App\Permissions;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permission_create = new Permissions();
        $permission_create->titre = 'CREATE';
        $permission_create->description = 'Creation de donné';
        $permission_create->save();

        $permission_read = new Permissions();
        $permission_read->titre = 'READ';
        $permission_read->description = 'Lecture de donné';
        $permission_read->save();

        $permission_update = new Permissions();
        $permission_update->titre = 'UPDATE';
        $permission_update->description = 'Mis à jour de donné';
        $permission_update->save();

        $permission_delete = new Permissions();
        $permission_delete->titre = 'DELETE';
        $permission_delete->description = 'Suppression de donné';
        $permission_delete->save();

        $permission_other = new Permissions();
        $permission_other->titre = 'OTHER';
        $permission_other->description = 'Autre droits';
        $permission_other->save();
    }
}
