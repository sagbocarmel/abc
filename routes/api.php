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
    Route::get('abc/users',[
        'uses' => 'API\UserController@getList',
        'as' => 'list_users'
    ]);

    Route::get('abc/user/{tel}',[
        'uses' => 'API\UserController@show',
        'as' => 'user_with_tel'
    ]);

    Route::get('abc/users/count',[
        'uses' => 'API\UserController@countUser',
        'as' => 'user_number'
    ]);

    Route::post('abc/new/user',[
        'uses' => 'API\UserController@registerNewUser',
        'as' => 'new_user'
    ]);

    Route::put('abc/user/{tel}',[
            'uses' => 'API\UserController@update',
            'as' => 'update_user'
        ]
    );

    Route::delete('abc/user/{tel}',[
            'uses' => 'API\UserController@delete',
            'as' => 'delete_user'
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
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::get('abc/access/role/{id}',[
            'uses' => 'AccessController@getRole',
            'as' => 'user_role_with_id',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::put('abc/access/role/{id}',[
            'uses' => 'AccessController@updateRole',
            'as' => 'update_role',
            'middleware'=>'permissions',
            'permissions' => ['UPDATE']
        ]
    );
    Route::post('abc/access/role',[
        'uses' => 'AccessController@createRole',
        'as' => 'new_role',
        'middleware'=>'permissions',
        'permissions' => ['CREATE']
    ]);

    Route::delete('abc/access/role/{id}',[
        'uses' => 'AccessController@deleteRole',
        'as' => 'delete_role',
        'middleware'=>'permissions',
        'permissions' => ['DELETE']
    ]);

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Permissions ressources Routes
    |
    |
    */

    Route::get('abc/access/permissions',[
            'uses' => 'AccessController@getPermissions',
            'as' => 'user_permission',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::get('abc/access/permission/{id}',[
            'uses' => 'AccessController@getPermission',
            'as' => 'permission_with_id',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::put('abc/access/permission/{id}',[
            'uses' => 'AccessController@updatePermission',
            'as' => 'update_permission',
            'middleware'=>'permissions',
            'permissions' => ['UPDATE']
        ]
    );
    Route::post('abc/access/permission',[
        'uses' => 'AccessController@createPermission',
        'as' => 'new_permission',
        'middleware'=>'permissions',
        'permissions' => ['CREATE']
    ]);

    Route::delete('abc/access/permission/{id}',[
        'uses' => 'AccessController@deletePermission',
        'as' => 'delete_permission',
        'middleware'=>'permissions',
        'permissions' => ['DELETE']
    ]);

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    |Permissions and Roles ressources Routes
    |
    |
    */
    Route::get('abc/access/roles/permissions',[
            'uses' => 'AccessController@getRolesPermissions',
            'as' => 'access',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );

    Route::get('abc/access/role/{id}/permissions',[
            'uses' => 'AccessController@getRolePermission',
            'as' => 'access_with_id',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );

    Route::post('abc/access/role/permission',[
        'uses' => 'AccessController@createRolePermission',
        'as' => 'new_access',
        'middleware'=>'permissions',
        'permissions' => ['CREATE']
    ]);

    Route::delete('abc/access/role/{id}/permission/{id_permission}',[
        'uses' => 'AccessController@deleteRolePermission',
        'as' => 'delete_access',
        'middleware'=>'permissions',
        'permissions' => ['DELETE']
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
    | Classe ressources ressources Routes
    |
    |
    */
    Route::get('abc/classes',[
            'uses' => 'ClasseController@getClasses',
            'as' => 'classes',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::get('abc/classe/{id}',[
            'uses' => 'ClasseController@show',
            'as' => 'classe_with_id',
            'middleware'=>'permissions',
            'permissions' => ['READ']
        ]
    );
    Route::put('abc/classe/{id}',[
            'uses' => 'ClasseController@update',
            'as' => 'update_classe',
            'middleware'=>'permissions',
            'permissions' => ['UPDATE']
        ]
    );
    Route::post('abc/classe',[
        'uses' => 'ClasseController@create',
        'as' => 'new_classe',
        'middleware'=>'permissions',
        'permissions' => ['CREATE']
    ]);

    Route::delete('abc/classe/{id}',[
        'uses' => 'ClasseController@destroy',
        'as' => 'delete_classe',
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





