<?php

use App\Models\Role;use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_nouser = new Role();
        $role_nouser->codeRole = 'None';
        $role_nouser->description = 'No role at this end';
        $role_nouser->save();

        $role_superadmin = new Role();
        $role_superadmin->codeRole = 'SuperAdmin';
        $role_superadmin->description = 'Administrateur principale du système';
        $role_superadmin->save();

        $role_superadmin0 = new Role();
        $role_superadmin0->codeRole = 'SuperAdmin0';
        $role_superadmin0->description = 'Platform owner principale';
        $role_superadmin0->save();

        $role_superadmin1 = new Role();
        $role_superadmin1->codeRole = 'SuperAdmin1';
        $role_superadmin1->description = 'Platform owner secondaire';
        $role_superadmin1->save();

        $role_superuser = new Role();
        $role_superuser->codeRole = 'SuperUser';
        $role_superuser->description = 'Administrateur Grade 2 du système';
        $role_superuser->save();

        $role_user0 = new Role();
        $role_user0->codeRole = 'User0';
        $role_user0->description = 'Accès niveau 1 de l\'établissement';
        $role_user0->save();

        $role_user1 = new Role();
        $role_user1->codeRole = 'User1';
        $role_user1->description = 'Accès niveau 2 de l\'établissement';
        $role_user1->save();

        $role_user2 = new Role();
        $role_user2->codeRole = 'User2';
        $role_user2->description = 'Accès niveau 3 de l\'établissement';
        $role_user2->save();

        $role_user3 = new Role();
        $role_user3->codeRole = 'User3';
        $role_user3->description = 'Accès niveau 4 de l\'établissement';
        $role_user3->save();

        $role_userD0 = new Role();
        $role_userD0->codeRole = 'Dev0';
        $role_userD0->description = 'Développeur ou Informaticien principale';
        $role_userD0->save();

        $role_userD1 = new Role();
        $role_userD1->codeRole = 'Dev1';
        $role_userD1->description = 'Développeur ou Informaticien secondaire';
        $role_userD1->save();

        $role_userP = new Role();
        $role_userP->codeRole = 'Parent';
        $role_userP->description = 'Parent (Papa, Maman ou tuteur) de l\'élève';
        $role_userP->save();

        $role_userEt = new Role();
        $role_userEt->codeRole = 'Enseignant';
        $role_userEt->description = 'Un enseignant de l\'établissement';
        $role_userEt->save();

        $role_userEl = new Role();
        $role_userEl->codeRole = 'Eleve';
        $role_userEl->description = 'Elèves d\'un établissement';
        $role_userEl->save();

    }
}
