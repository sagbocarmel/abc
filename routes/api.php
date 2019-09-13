<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact abc owner'], 404);
});
Route::post('abc/register', 'API\UserController@register');

Route::post('abc/login', 'API\UserController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
|
|
|
*/

Route::middleware('auth:api')->group( function () {

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    |Users Ressources Routes
    |
    |
    */
    Route::post('logout','API\UserController@logoutApi');

    Route::get('abc/users',[
        'uses' => 'API\UserController@getList',
        'as' => 'list_users',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
        'acces' => ['S','R','A','B','E'],
        'elts' => ['48c5m_Utilisateur']
    ]);

    Route::get('abc/user/{tel}',[
        'uses' => 'API\UserController@show',
        'as' => 'user_with_tel',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
        'elts' => ['48c5m_Utilisateur']
    ]);

    Route::get('abc/users/count',[
        'uses' => 'API\UserController@countUser',
        'as' => 'user_number',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
        'acces' => ['S','R','A','B','E'],
        'elts' => ['48c5m_Utilisateur']
    ]);

    Route::post('abc/new/user',[
        'uses' => 'API\UserController@registerNewUser',
        'as' => 'new_user',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1','SuperAdmin2'],
        'acces' => ['S','C','A','B'],
        'elts' => ['48c5m_Utilisateur']
    ]);

    Route::put('abc/user/{tel}',[
            'uses' => 'API\UserController@update',
            'as' => 'update_user',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
            'acces' => ['S','U','A','E'],
            'elts' => ['48c5m_Utilisateur']
        ]
    );

    Route::delete('abc/user/{tel}',[
            'uses' => 'API\UserController@delete',
            'as' => 'delete_user',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
            'acces' => ['S','D'],
            'elts' => ['48c5m_Utilisateur']
        ]
    );

    /*
     |--------------------------------------------------------------------------
     | API Routes
     |--------------------------------------------------------------------------
     |
     | Roles ressources Routes
     |
     |
     */
    Route::get('abc/access/roles',[
            'uses' => 'AccessController@getRoles',
            'as' => 'user_roles',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
            'acces' => ['S'],
            'elts' => ['48c5m_Role']
        ]
    );
    Route::get('abc/access/role/{id}',[
            'uses' => 'AccessController@getRole',
            'as' => 'user_role_with_id',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
            'acces' => ['S'],
            'elts' => ['48c5m_Role']
        ]
    );
    Route::put('abc/access/role/{id}',[
            'uses' => 'AccessController@updateRole',
            'as' => 'update_role',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
            'acces' => ['S'],
            'elts' => ['48c5m_Role']
        ]
    );
    Route::post('abc/access/role',[
        'uses' => 'AccessController@createRole',
        'as' => 'new_role',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
        'acces' => ['S'],
        'elts' => ['48c5m_Role']
    ]);

    Route::delete('abc/access/role/{id}',[
        'uses' => 'AccessController@deleteRole',
        'as' => 'delete_role',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
        'acces' => ['S'],
        'elts' => ['48c5m_Role']
    ]);

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Droits ressources Routes
    |
    |
    */

    Route::get('abc/access/droits',[
            'uses' => 'AccessController@getDroits',
            'as' => 'user_droit',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
            'acces' => ['S'],
            'elts' => ['48c5m_Droits','48c5m_Role','48c5m_Element']
        ]
    );
    Route::get('abc/access/droit/{codeRole}/{codeElement}/{droit}',[
            'uses' => 'AccessController@getDroit',
            'as' => 'droit_with_id',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
            'acces' => ['S'],
            'elts' => ['48c5m_Droits','48c5m_Role','48c5m_Element']
        ]
    );
    Route::put('abc/access/droit/{codeRole}/{codeElement}/{droit}',[
            'uses' => 'AccessController@updateDroit',
            'as' => 'update_droit',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
            'acces' => ['S'],
            'elts' => ['48c5m_Droits','48c5m_Role','48c5m_Element']
        ]
    );
    Route::post('abc/access/droit',[
        'uses' => 'AccessController@createDroit',
        'as' => 'new_droit',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
        'acces' => ['S'],
        'elts' => ['48c5m_Droits','48c5m_Role','48c5m_Element']
    ]);

    Route::delete('abc/access/droit/{codeRole}/{codeElement}/{droit}',[
        'uses' => 'AccessController@deleteDroit',
        'as' => 'delete_permission',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
        'acces' => ['S'],
        'elts' => ['48c5m_Droits','48c5m_Role','48c5m_Element']
    ]);

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    |Profile ressources Routes
    |
    |
    */
    Route::get('abc/access/profiles',[
            'uses' => 'AccessController@indexProfile',
            'as' => 'profiles',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
            'acces' => ['S'],
            'elts' => ['48c5m_Profile','48c5m_Role']
        ]
    );

    Route::get('abc/access/profile/{codeEtablissement}/{telUtilisateur}',[
            'uses' => 'AccessController@showProfile',
            'as' => 'show_profile',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
            'acces' => ['S'],
            'elts' => ['48c5m_Droits','48c5m_Role','48c5m_Element']
        ]
    );

    Route::post('abc/access/profile',[
        'uses' => 'AccessController@createProfile',
        'as' => 'new_profile',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
        'acces' => ['S'],
        'elts' => ['48c5m_Droits','48c5m_Role','48c5m_Element']
    ]);

    Route::delete('abc/access/profile/{codeEtablissement}/{telUtilisateur}',[
        'uses' => 'AccessController@deleteRolePermission',
        'as' => 'delete_profile',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
        'acces' => ['S'],
        'elts' => ['48c5m_Droits','48c5m_Role','48c5m_Element']
    ]);

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Annee Scolaire  ressources Routes
    |
    |
    */
    Route::get('abc/annees-scolaires',[
            'uses' => 'AnneeScolaireController@index',
            'as' => 'list_annee_scolaire',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_AnneeScolaire']
        ]
    );

    Route::get('abc/annees-scolaire/{id}',[
            'uses' => 'AnneeScolaireController@show',
            'as' => 'show_annee_scolaire',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_AnneeScolaire']
        ]
    );

    Route::put('abc/annees-scolaire/{id}',[
            'uses' => 'AnneeScolaireController@update',
            'as' => 'update_annee_scolaire',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
            'acces' => ['S','U','A','B','E'],
            'elts' => ['48c5m_AnneeScolaire']
        ]
    );
    Route::post('abc/annees-scolaire',[
        'uses' => 'AnneeScolaireController@store',
        'as' => 'new_anneee_scolaire',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
        'acces' => ['S','C','A','B'],
        'elts' => ['48c5m_AnneeScolaire']
    ]);

    Route::delete('abc/annees-scolaire',[
        'uses' => 'AnneeScolaireController@destroy',
        'as' => 'delete_annee_scolaire',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin','SuperAdmin0','SuperAdmin1'],
        'acces' => ['S','D',],
        'elts' => ['48c5m_AnneeScolaire']
    ]);

    /*
   |--------------------------------------------------------------------------
   | API Routes
   |--------------------------------------------------------------------------
   |
   | Annee Scolaire Etablissement  ressources Routes
   |
   |
   */

    Route::get('abc/annees-scolaire/etablissements',[
            'uses' => 'AnneeScolaireEtablissementController@index',
            'as' => 'list_annee_scolaire_etablissement',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_AnneeScolaire']
        ]
    );

    Route::get('abc/annees-scolaire/etablissement/{id}',[
            'uses' => 'AnneeScolaireEtablissementController@show',
            'as' => 'show_annee_scolaire_etablissement',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_AnneeScolaire']
        ]
    );

    Route::put('abc/annees-scolaire/etablissement/{id}',[
            'uses' => 'AnneeScolaireEtablissementController@update',
            'as' => 'update_annee_scolaire_etablissement',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','U','A','B','E'],
            'elts' => ['48c5m_AnneeScolaire']
        ]
    );
    Route::post('abc/annees-scolaire/etablissement',[
        'uses' => 'AnneeScolaireEtablissementController@store',
        'as' => 'new_anneee_scolaire_etablissement',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','C','A','B'],
        'elts' => ['48c5m_AnneeScolaire']
    ]);

    Route::delete('abc/annees-scolaire/etablissement/{id}',[
        'uses' => 'AnneeScolaireEtablissementController@destroy',
        'as' => 'delete_annee_scolaire_etablissement',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','D',],
        'elts' => ['48c5m_AnneeScolaire']
    ]);

    /*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Appréciation  ressources Routes
  |
  |
  */

    Route::get('abc/appreciation/{codeEtablissement}/{codeAnnee}/{matriculeEleve/{niveau}/{codeClasse}/{codeMatiere}/{codeEvaluation}/{periode}',[
            'uses' => 'AppreciationController@show',
            'as' => 'show_appreciation',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Appreciations']
        ]
    );

    Route::put('abc/appreciation/{codeEtablissement}/{codeAnnee}/{matriculeEleve/{niveau}/{codeClasse}/{codeMatiere}/{codeEvaluation}/{periode}',[
            'uses' => 'AppreciationController@update',
            'as' => 'update_appreciation',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','U','A','B','E'],
            'elts' => ['48c5m_Appreciations']
        ]
    );
    Route::post('abc/appreciation',[
        'uses' => 'AppreciationController@store',
        'as' => 'new_appreciation',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','C','A','B'],
        'elts' => ['48c5m_Appreciations']
    ]);

    Route::delete('abc/appreciation/{codeEtablissement}/{codeAnnee}/{matriculeEleve/{niveau}/{codeClasse}/{codeMatiere}/{codeEvaluation}/{periode}',[
        'uses' => 'AppreciationController@destroy',
        'as' => 'delete_appreciation',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','D',],
        'elts' => ['48c5m_Appreciations']
    ]);

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Bulletins  ressources Routes
    |
    |
    */
    Route::get('abc/bulletins/{codeEtablissement}/{codeAnnee}/{periode}',[
            'uses' => 'BulletinController@index',
            'as' => 'list_bulletin',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Bulletins']
        ]
    );

    Route::get('abc/bulletin/{codeEtablissement}/{codeAnnee}/{matriculeEleve}/{periode}',[
            'uses' => 'BulletinController@show',
            'as' => 'show_bulletin',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Bulletins']
        ]
    );

    Route::put('abc/bulletin/{codeEtablissement}/{codeAnnee}/{matriculeEleve}/{periode}',[
            'uses' => 'BulletinController@update',
            'as' => 'update_bulletin',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','U','A','B','E'],
            'elts' => ['48c5m_Bulletins']
        ]
    );
    Route::post('abc/bulletin',[
        'uses' => 'BulletinController@store',
        'as' => 'new_bulletin',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','C','A','B'],
        'elts' => ['48c5m_Bulletins']
    ]);

    Route::delete('abc/bulletin/{codeEtablissement}/{codeAnnee}/{matriculeEleve}/{periode}',[
        'uses' => 'BulletinController@destroy',
        'as' => 'delete_bulletin',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','D',],
        'elts' => ['48c5m_Bulletins']
    ]);

    /*
     |--------------------------------------------------------------------------
     | API Routes
     |--------------------------------------------------------------------------
     |
     | Classe  ressources Routes
     |
     |
      */
    Route::get('abc/classes/{codeEtablissement}/{niveau}',[
            'uses' => 'ClasseController@getClassesByNiveau',
            'as' => 'classes_by_niveau',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Classe']
        ]
    );

    Route::get('abc/classe/{codeEtablissement}/{codeSection}',[
            'uses' => 'ClasseController@getClassesBySection',
            'as' => 'classes_by_section',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Classe']
        ]
    );

    Route::get('abc/classes',[
            'uses' => 'ClasseController@getClasses',
            'as' => 'classes',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Classe']
        ]
    );
    Route::get('abc/classe/{codeEtablissement}/{niveau}/{codeClasse}',[
            'uses' => 'ClasseController@show',
            'as' => 'show_classe',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Classe']
        ]
    );

    Route::put('abc/classe/{codeEtablissement}/{niveau}/{codeClasse}',[
            'uses' => 'ClasseController@update',
            'as' => 'update_classe',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','U','A','B','E'],
            'elts' => ['48c5m_Classe']
        ]
    );

    Route::post('abc/classe',[
        'uses' => 'ClasseController@create',
        'as' => 'new_classe',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','C','A','B'],
        'elts' => ['48c5m_Classe']
    ]);

    Route::delete('abc/classe/{codeEtablissement}/{niveau}/{codeClasse}',[
        'uses' => 'ClasseController@destroy',
        'as' => 'delete_classe',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','D',],
        'elts' => ['48c5m_Classe']
    ]);

    /*
     |--------------------------------------------------------------------------
     | API Routes
     |--------------------------------------------------------------------------
     |
     | Cours  ressources Routes
     |
     |
     */
    Route::get('abc/cours/{codeEtablissement}/{niveau}/{codeClasse}/{codeAnnee}',[
            'uses' => 'CoursController@index',
            'as' => 'cours_by_classe',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Cours']
        ]
    );

    Route::get('abc/cours/{codeEtablissement}/{codeAnnee}',[
            'uses' => 'CoursController@getAllByEtablissement',
            'as' => 'cours_by_etablissement',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Cours']
        ]
    );

    Route::get('abc/cours/{codeEtablissement}/{niveau}/{codeClasse}/{codeAnnee}/{codeMatiere}',[
            'uses' => 'CoursController@getAllByMatiere',
            'as' => 'cours_by_matiere',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Cours']
        ]
    );

    Route::get('abc/cours/{codeEtablissement}/{niveau}/{codeAnnee}',[
            'uses' => 'CoursController@getAllByNiveau',
            'as' => 'cours_by_niveau',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Cours']
        ]
    );

    Route::get('abc/cours/{codeEtablissement}/{niveau}/{codeClasse}/{codeAnnee}/{codeMatiere}/{jourCours}',[
            'uses' => 'CoursController@show',
            'as' => 'show_classe',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Cours']
        ]
    );

    Route::put('abc/cours/{codeEtablissement}/{niveau}/{codeClasse}/{codeAnnee}/{codeMatiere}/{jourCours}',[
            'uses' => 'CoursController@update',
            'as' => 'update_cours',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','U','A','B','E'],
            'elts' => ['48c5m_Cours']
        ]
    );

    Route::post('abc/cours',[
        'uses' => 'CoursController@store',
        'as' => 'new_cours',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','C','A','B'],
        'elts' => ['48c5m_Cours']
    ]);

    Route::delete('abc/cours/{codeEtablissement}/{niveau}/{codeClasse}{codeAnnee}/{codeMatiere}/{joursCours}',[
        'uses' => 'CoursController@destroy',
        'as' => 'delete_cours',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','D',],
        'elts' => ['48c5m_Cours']
    ]);

    /*
     |--------------------------------------------------------------------------
     | API Routes
     |--------------------------------------------------------------------------
     |
     | Eleves  ressources Routes
     |
     |
     */
    Route::get('abc/eleves',[
            'uses' => 'ElevesController@index',
            'as' => 'all_eleves',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Eleve']
        ]
    );

    Route::get('abc/eleve/{matriculeEleve}',[
            'uses' => 'ElevesController@show',
            'as' => 'show_eleve',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_Eleve']
        ]
    );

    Route::put('abc/eleve/{matriculeEleve}',[
            'uses' => 'ElevesController@update',
            'as' => 'update_eleve',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','U','A','B','E'],
            'elts' => ['48c5m_Eleve']
        ]
    );

    Route::post('abc/eleve',[
        'uses' => 'ElevesController@create',
        'as' => 'new_eleve',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','C','A','B'],
        'elts' => ['48c5m_Eleve']
    ]);

    Route::delete('abc/eleve/{matriculeEleve}',[
        'uses' => 'ElevesController@destroy',
        'as' => 'delete_eleve',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','D',],
        'elts' => ['48c5m_Eleve']
    ]);

    /*
     |--------------------------------------------------------------------------
     | API Routes
     |--------------------------------------------------------------------------
     |
     |   Enseignant et Classes ressources Routes
     |
     |
     */
    Route::get('abc/enseignant/classe',[
            'uses' => 'EnseignantClasseController@index',
            'as' => 'all_eleves',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_EnseignantClasse']
        ]
    );

    Route::get('abc/enseignant/classe',[
            'uses' => 'EnseignantClasseController@show',
            'as' => 'show_eleve',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','R','A','B','E'],
            'elts' => ['48c5m_EnseignantClasse']
        ]
    );

    Route::put('abc/enseignant/classe/{codeEtablissement}/{matriculeEnseignant}/{codeClasse}',[
            'uses' => 'EnseignantClasseController@update',
            'as' => 'update_enseignant_classe',
            'middleware'=>['permissions', 'elements'],
            'roles' => [
                'SuperAdmin',
                'SuperAdmin0',
                'SuperAdmin1',
                'SuperUser',
                'User0',
                'User1',
                'User2',
                'User3',
                'Parent'],
            'acces' => ['S','U','A','B','E'],
            'elts' => ['48c5m_EnseignantClasse']
        ]
    );

    Route::post('abc/enseignant/classe',[
        'uses' => 'EnseignantClasseController@create',
        'as' => 'new_eleve',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','C','A','B'],
        'elts' => ['48c5m_EnseignantClasse']
    ]);

    Route::delete('abc/enseignant/classe/{codeEtablissement}/{matriculeEnseignant}/{codeClasse}/{niveau}',[
        'uses' => 'EnseignantClasseController@destroy',
        'as' => 'delete_enseignant_classe',
        'middleware'=>['permissions', 'elements'],
        'roles' => [
            'SuperAdmin',
            'SuperAdmin0',
            'SuperAdmin1',
            'SuperUser',
            'User0',
            'User1',
            'User2',
            'User3',
            'Parent'],
        'acces' => ['S','D',],
        'elts' => ['48c5m_EnseignantClasse']
    ]);
    /*
     |--------------------------------------------------------------------------
     | API Routes
     |--------------------------------------------------------------------------
     |
     | Sections  ressources Routes
     |
     |
     */
    Route::get('abc/sections',[
            'uses' => 'SectionsController@getSections',
            'as' => 'sections',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::get('abc/section/{id}',[
            'uses' => 'SectionsController@show',
            'as' => 'section_with_id',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::put('abc/section/{id}',[
            'uses' => 'SectionsController@update',
            'as' => 'update_section',
            'middleware'=>'permissions',
            'permissions' => ['UPDATE']
        ]
    );
    Route::post('abc/section',[
        'uses' => 'SectionsController@create',
        'as' => 'new_section',
        'middleware'=>'permissions',
        'permissions' => ['CREATE']
    ]);

    Route::delete('abc/section/{id}',[
        'uses' => 'SectionsController@destroy',
        'as' => 'delete_section',
        'middleware'=>'permissions',
        'permissions' => ['DELETE']
    ]);

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    |  Notes ressources Routes
    |
    |
    */
    Route::get('abc/notes/eleve/{id}/{matricule}',[
            'uses' => 'NotesController@getNotes',
            'as' => 'notes',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );

    Route::get('abc/notes/evaluation/{id}',[
            'uses' => 'NotesController@getNotes',
            'as' => 'notes',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );

    Route::get('abc/notes/evaluation/{id}/{id_eleve}/{matricule}',[
            'uses' => 'NotesController@getNotes',
            'as' => 'notes',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );

    Route::get('abc/notes/',[
            'uses' => 'NotesController@getNotes',
            'as' => 'notes',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );

    Route::get('abc/note/{id_eleve}/{id_evaluation}',[
            'uses' => 'NotesController@show',
            'as' => 'note_with_id',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::put('abc/note/{id}',[
            'uses' => 'NotesController@update',
            'as' => 'update_note',
            'middleware'=>'permissions',
            'permissions' => ['UPDATE']
        ]
    );

    Route::post('abc/note',[
        'uses' => 'NotesController@create',
        'as' => 'new_note',
        'middleware'=>'permissions',
        'permissions' => ['CREATE']
    ]);

    Route::delete('abc/note/{id}',[
        'uses' => 'NotesController@delete',
        'as' => 'delete_note',
        'middleware'=>'permissions',
        'permissions' => ['DELETE']
    ]);

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Matieres ressources Routes
    |
    |
    */
    Route::get('abc/matieres',[
            'uses' => 'MatieresController@getMatieres',
            'as' => 'matieres',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::get('abc/matiere/{id}',[
            'uses' => 'MatieresController@show',
            'as' => 'matiere_with_id',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::put('abc/matiere/{id}',[
            'uses' => 'MatieresController@update',
            'as' => 'update_matiere',
            'middleware'=>'permissions',
            'permissions' => ['UPDATE']
        ]
    );
    Route::post('abc/matiere',[
        'uses' => 'MatieresController@create',
        'as' => 'new_matiere',
        'middleware'=>'permissions',
        'permissions' => ['CREATE']
    ]);

    Route::delete('abc/matiere/{id}',[
        'uses' => 'MatieresController@destroy',
        'as' => 'delete_matiere',
        'middleware'=>'permissions',
        'permissions' => ['DELETE']
    ]);

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Enseignants ressources Routes
    |
    |
    */
    Route::get('abc/enseignants',[
            'uses' => 'EnseignantsController@getEnseignants',
            'as' => 'enseignants',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::get('abc/enseignant/{id}',[
            'uses' => 'EnseignantsController@show',
            'as' => 'enseignant_with_id',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::put('abc/enseignant/{id}',[
            'uses' => 'EnseignantsController@update',
            'as' => 'update_enseignant',
            'middleware'=>'permissions',
            'permissions' => ['UPDATE']
        ]
    );
    Route::post('abc/enseignant',[
        'uses' => 'EnseignantsController@create',
        'as' => 'new_enseignant',
        'middleware'=>'permissions',
        'permissions' => ['CREATE']
    ]);

    Route::delete('abc/enseignant/{id}',[
        'uses' => 'EnseignantsController@delete',
        'as' => 'delete_enseignant',
        'middleware'=>'permissions',
        'permissions' => ['DELETE']
    ]);

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Etablissements ressources Routes
    |
    |
    */
    Route::get('abc/etablissements',[
            'uses' => 'EtablissementController@viewAny',
             'middleware'=>['permissions', 'elements'],
             'roles' => ['SuperAdmin'],
             'acces' => ['S'],
             'elts' => ['48c5m_Etablissement']
        ]
    );

    Route::get('abc/etablissement/{id}',[
            'uses' => 'EtablissementController@show',
            'as' => 'etablissement_with_id',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin'],
            'acces' => ['S'],
            'elts' => ['48c5m_Etablissement']
        ]
    );
    Route::put('abc/etablissement/{id}',[
            'uses' => 'EtablissementController@update',
            'as' => 'update_etablissement',
            'middleware'=>['permissions', 'elements'],
            'roles' => ['SuperAdmin'],
            'acces' => ['S'],
            'elts' => ['48c5m_Etablissement']
        ]
    );
    Route::post('abc/etablissement',[
        'uses' => 'EtablissementController@create',
        'as' => 'new_etablissement',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin'],
        'acces' => ['S'],
        'elts' => ['48c5m_Etablissement']
    ]);

    Route::delete('abc/etablissement/{id}',[
        'uses' => 'EtablissementController@destroy',
        'as' => 'delete_etablissement',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin'],
        'acces' => ['S'],
        'elts' => ['48c5m_Etablissement']
    ]);

    Route::get('abc/etablissement/{id}/classes',[
        'uses' => 'EtablissementController@allClasses',
        'as' => 'all_classe',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin'],
        'acces' => ['S'],
        'elts' => ['48c5m_Etablissement']
    ]);

    Route::get('abc/etablissement/{id}/users/list',[
        'uses' => 'EtablissementsController@getListUsers',
        'as' => 'etablissement_list_users',
        'middleware'=>['permissions', 'elements'],
        'roles' => ['SuperAdmin'],
        'acces' => ['S'],
        'elts' => ['48c5m_Etablissement']
    ]);


    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    |  Evaluation ressources Routes
    |
    |
    */
    Route::get('abc/classe/{id}/evaluations',[
            'uses' => 'EvaluationsController@getEvaluationsByClasse',
            'as' => 'evaluations',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::get('abc/matiere/{id}/evaluations',[
            'uses' => 'EvaluationsController@getEvaluationsByMatiere',
            'as' => 'evaluations',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );

    Route::get('abc/evaluation/{id}',[
            'uses' => 'EvaluationsController@show',
            'as' => 'evaluation_with_id',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::put('abc/evaluation/{id}',[
            'uses' => 'EvaluationsController@update',
            'as' => 'update_evaluation',
            'middleware'=>'permissions',
            'permissions' => ['UPDATE']
        ]
    );
    Route::post('abc/evaluation',[
        'uses' => 'EvaluationsController@create',
        'as' => 'new_evaluation',
        'middleware'=>'permissions',
        'permissions' => ['CREATE']
    ]);

    Route::delete('abc/evaluation/{id}',[
        'uses' => 'EvaluationsController@delete',
        'as' => 'delete_evaluation',
        'middleware'=>'permissions',
        'permissions' => ['DELETE']
    ]);

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Eleve ressources Routes
    |
    |
    */
    Route::get('abc/etablissement/classe/{id_classe}/eleves',[
            'uses' => 'ElevesController@getElevesByClasse',
            'as' => 'eleves',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );

    Route::get('abc/eleve/{id}',[
            'uses' => 'ElevesController@show',
            'as' => 'eleve_with_id'
        ]
    );

    Route::get('abc/eleve/matricule/{matricule}',[
            'uses' => 'ElevesController@showByMatricule',
            'as' => 'eleve_with_matricule'
        ]
    );

    Route::post('abc/eleve/{id}/{matricule}',[
            'uses' => 'ElevesController@update',
            'as' => 'update_eleve',
            'middleware'=>'permissions',
            'permissions' => ['UPDATE']
        ]
    );

    Route::post('abc/eleve',[
        'uses' => 'ElevesController@create',
        'as' => 'new_eleve',
        'middleware'=>'permissions',
        'permissions' => ['CREATE']
    ]);

    Route::delete('abc/eleve/{id}',[
        'uses' => 'ElevesController@destroy',
        'as' => 'delete_eleve',
        'middleware'=>'permissions',
        'permissions' => ['DELETE']
    ]);

    Route::delete('abc/etablissement/eleve/{matricule}',[
        'uses' => 'ElevesController@destroyByMatricule',
        'as' => 'delete_eleve_matricule',
        'middleware'=>'permissions',
        'permissions' => ['DELETE']
    ]);



    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Moyenne Matieres ressources Routes
    |
    |
    */


    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Moyenne Periode ressources Routes
    |
    |
    */

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Moyenne Annuelles ressources Routes
    |
    |
    */
    // template
    Route::get('abc/}',[
            'uses' => '@',
            'as' => '',
            'middleware'=>'permissions',
            'permissions' => ['UPDATE']
        ]
    );

    Route::put('abc/}',[
            'uses' => '@',
            'as' => '',
            'middleware'=>'permissions',
            'permissions' => ['UPDATE']
        ]
    );
    Route::post('abc/}',[
        'uses' => '@',
        'as' => '',
        'middleware'=>'permissions',
        'permissions' => ['CREATE']
    ]);

    Route::delete('abc/}',[
        'uses' => '@',
        'as' => '',
        'middleware'=>'permissions',
        'permissions' => ['DELETE']
    ]);

});





