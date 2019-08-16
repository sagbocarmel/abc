<?php

use App\Permission;
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
        $permission_read = new Permission();
        $permission_read->titre = 'READ';
        $permission_read->description = 'Lecture de donné';

        $permission_create = new Permission();
        $permission_create->titre = 'CREATE';
        $permission_create->description = 'Creation de donné';

        $permission_update = new Permission();
        $permission_update->titre = 'UPDATE';
        $permission_update->description = 'Mis à jour de donné';

        $permission_delete = new Permission();
        $permission_delete->titre = 'DELETE';
        $permission_delete->description = 'Suppression de donné';

        $permission_other = new Permission();
        $permission_other->titre = 'OTHER';
        $permission_other->description = 'Autre droits';
    }
}
