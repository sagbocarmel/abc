<?php

use App\PermissionsDeRole;
use Illuminate\Database\Seeder;

class PermissionsDeRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Super Admin
        $pr1 = new PermissionsDeRole();
        $pr1->idPermission = 1;
        $pr1->idRole = 2;
        $pr1->save();

        $pr2 = new PermissionsDeRole();
        $pr2->idPermission = 2;
        $pr2->idRole = 2;
        $pr2->save();

        $pr3 = new PermissionsDeRole();
        $pr3->idPermission = 3;
        $pr3->idRole = 2;
        $pr3->save();

        $pr4 = new PermissionsDeRole();
        $pr4->idPermission = 4;
        $pr4->idRole = 2;
        $pr4->save();

        $pr5 = new PermissionsDeRole();
        $pr5->idPermission = 5;
        $pr5->idRole = 2;
        $pr5->save();

        // Super User
        $pr6 = new PermissionsDeRole();
        $pr6->idPermission = 1;
        $pr6->idRole = 3;
        $pr6->save();

        $pr7 = new PermissionsDeRole();
        $pr7->idPermission = 2;
        $pr7->idRole = 3;
        $pr7->save();

        $pr8 = new PermissionsDeRole();
        $pr8->idPermission = 3;
        $pr8->idRole = 3;
        $pr8->save();

        $pr9 = new PermissionsDeRole();
        $pr9->idPermission = 4;
        $pr9->idRole = 3;
        $pr9->save();

        // User0
        $pr10 = new PermissionsDeRole();
        $pr10->idPermission = 1;
        $pr10->idRole = 4;
        $pr10->save();

        $pr11 = new PermissionsDeRole();
        $pr11->idPermission = 2;
        $pr11->idRole = 4;
        $pr11->save();

        $pr12 = new PermissionsDeRole();
        $pr12->idPermission = 3;
        $pr12->idRole = 4;
        $pr12->save();

        // User1
        $pr13 = new PermissionsDeRole();
        $pr13->idPermission = 1;
        $pr13->idRole = 5;
        $pr13->save();

        $pr14 = new PermissionsDeRole();
        $pr14->idPermission = 2;
        $pr14->idRole = 5;
        $pr14->save();

        $pr15 = new PermissionsDeRole();
        $pr15->idPermission = 4;
        $pr15->idRole = 5;
        $pr15->save();

        // User2
        $pr16 = new PermissionsDeRole();
        $pr16->idPermission = 1;
        $pr16->idRole = 6;
        $pr16->save();

        $pr17 = new PermissionsDeRole();
        $pr17->idPermission = 2;
        $pr17->idRole = 6;
        $pr17->save();

        // User3
        $pr18 = new PermissionsDeRole();
        $pr18->idPermission = 2;
        $pr18->idRole = 7;
        $pr18->save();

        // Dev 0
        $pr19 = new PermissionsDeRole();
        $pr19->idPermission = 1;
        $pr19->idRole = 8;
        $pr19->save();

        $pr20 = new PermissionsDeRole();
        $pr20->idPermission = 2;
        $pr20->idRole = 8;
        $pr20->save();

        $pr21 = new PermissionsDeRole();
        $pr21->idPermission = 5;
        $pr21->idRole = 8;
        $pr21->save();

        // Dev 1
        $pr22 = new PermissionsDeRole();
        $pr22->idPermission = 1;
        $pr22->idRole = 9;
        $pr22->save();

        $pr23 = new PermissionsDeRole();
        $pr23->idPermission = 5;
        $pr23->idRole = 9;
        $pr23->save();

        // Parent
        $pr24 = new PermissionsDeRole();
        $pr24->idPermission = 2;
        $pr24->idRole = 10;
        $pr24->save();

        // Enseignants
        $pr25 = new PermissionsDeRole();
        $pr25->idPermission = 1;
        $pr25->idRole = 11;
        $pr25->save();

        $pr26 = new PermissionsDeRole();
        $pr26->idPermission = 2;
        $pr26->idRole = 11;
        $pr26->save();

        $pr27 = new PermissionsDeRole();
        $pr27->idPermission = 3;
        $pr27->idRole = 11;
        $pr27->save();

        // Eleve
        $pr28 = new PermissionsDeRole();
        $pr28->idPermission = 2;
        $pr28->idRole = 12;
        $pr28->save();
    }
}
