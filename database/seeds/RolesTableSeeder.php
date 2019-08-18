<?php

use App\Roles;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_nouser = new Roles();
        $role_nouser->titre = 'None';
        $role_nouser->description = 'No role at this end';
        $role_nouser->save();

        $role_superadmin = new Roles();
        $role_superadmin->titre = 'SuperAdmin';
        $role_superadmin->description = 'Administrateur principale du système';
        $role_superadmin->save();

        $role_superuser = new Roles();
        $role_superuser->titre = 'SuperUser';
        $role_superuser->description = 'Administrateur Grade 2 du système';
        $role_superuser->save();

        $role_user0 = new Roles();
        $role_user0->titre = 'User0';
        $role_user0->description = 'Accès niveau 1 de l\'établissement';
        $role_user0->save();

        $role_user1 = new Roles();
        $role_user1->titre = 'User1';
        $role_user1->description = 'Accès niveau 2 de l\'établissement';
        $role_user1->save();

        $role_user2 = new Roles();
        $role_user2->titre = 'User2';
        $role_user2->description = 'Accès niveau 3 de l\'établissement';
        $role_user2->save();

        $role_user3 = new Roles();
        $role_user3->titre = 'User3';
        $role_user3->description = 'Accès niveau 4 de l\'établissement';
        $role_user3->save();

        $role_userD0 = new Roles();
        $role_userD0->titre = 'Dev0';
        $role_userD0->description = 'Développeur ou Informaticien principale';
        $role_userD0->save();

        $role_userD1 = new Roles();
        $role_userD1->titre = 'Dev1';
        $role_userD1->description = 'Développeur ou Informaticien secondaire';
        $role_userD1->save();

        $role_userP = new Roles();
        $role_userP->titre = 'Parent';
        $role_userP->description = 'Parent (Papa, Maman ou tuteur) de l\'élève';
        $role_userP->save();

        $role_userEt = new Roles();
        $role_userEt->titre = 'Enseignant';
        $role_userEt->description = 'Un enseignant de l\'établissement';
        $role_userEt->save();

        $role_userEl = new Roles();
        $role_userEl->titre = 'Eleve';
        $role_userEl->description = 'Elèves d\'un établissement';
        $role_userEl->save();

    }
}
