<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // register Swagger for api documentation
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
        $this->app->register(\Reliese\Coders\CodersServiceProvider::class);

        $this->app->bind(
            \App\Repositories\AnneeScolaireEtablissementRepositoryInterface::class,
            \App\Repositories\AnneeScolaireEtablissementRepository::class
        );

        $this->app->bind(
            \App\Repositories\AnneeScolaireRepositoryInterface::class,
            \App\Repositories\AnneeScolaireRepository::class
        );

        $this->app->bind(
            \App\Repositories\AppreciationRepositoryInterface::class,
            \App\Repositories\AppreciationRepository::class
        );

        $this->app->bind(
            \App\Repositories\BulletinRepositoryInterface::class,
            \App\Repositories\BulletinRepository::class
        );

        $this->app->bind(
            \App\Repositories\CoursRepositoryInterface::class,
            \App\Repositories\CoursRepository::class
        );

        $this->app->bind(
            \App\Repositories\DroitsRepositoryInterface::class,
            \App\Repositories\DroitsRepository::class
        );

        $this->app->bind(
            \App\Repositories\ElevesRepositoryInterface::class,
            \App\Repositories\ElevesRepository::class
        );

        $this->app->bind(
            \App\Repositories\EnseignantClasseRepositoryInterface::class,
            \App\Repositories\EnseignantClasseRepository::class
        );

        $this->app->bind(
            \App\Repositories\InscriptionRepositoryInterface::class,
            \App\Repositories\InscriptionRepository::class
        );

        $this->app->bind(
            \App\Repositories\MatieresDeClassesRepositoryInterface::class,
            \App\Repositories\MatieresDeClassesRepository::class
        );

        $this->app->bind(
            \App\Repositories\NiveauRepositoryInterface::class,
            \App\Repositories\NiveauRepository::class
        );

        $this->app->bind(
            \App\Repositories\ParentEleveRepositoryInterface::class,
            \App\Repositories\ParentEleveRepository::class
        );

        $this->app->bind(
            \App\Repositories\ProfileRepositoryInterface::class,
            \App\Repositories\ProfileRepository::class
        );

        $this->app->bind(
            \App\Repositories\RoleRepositoryInterface::class,
            \App\Repositories\RoleRepository::class
        );

        $this->app->bind(
            \App\Repositories\UtilisateurRepositoryInterface::class,
            \App\Repositories\UtilisateurRepository::class
        );

        $this->app->bind(
            'App\Repositories\ClasseRepositoryInterface',
            'App\Repositories\ClasseRepository'
        );

        $this->app->bind(
            'App\Repositories\EnseignantRepositoryInterface',
            'App\Repositories\EnseignantRepository'
        );
        $this->app->bind(
            'App\Repositories\EtablissementRepositoryInterface',
            'App\Repositories\EtablissementRepository'
        );
        $this->app->bind(
            'App\Repositories\EvaluationRepositoryInterface',
            'App\Repositories\EvaluationRepository'
        );
        $this->app->bind(
            'App\Repositories\MatieresRepositoryInterface',
            'App\Repositories\MatieresRepository'
        );
        $this->app->bind(
            'App\Repositories\MoyenneAnnuelleRepositoryInterface',
            'App\Repositories\MoyenneAnnuelleRepository'
        );
        $this->app->bind(
            'App\Repositories\MoyenneMatiereRepositoryInterface',
            'App\Repositories\MoyenneMatiereRepository'
        );
        $this->app->bind(
            'App\Repositories\MoyennePeriodeRepositoryInterface',
            'App\Repositories\MoyennePeriodeRepository'
        );
        $this->app->bind(
            'App\Repositories\NotesRepositoryInterface',
            'App\Repositories\NotesRepository'
        );
        $this->app->bind(
            'App\Repositories\ParentsRepository',
            'App\Repositories\ParentsRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\PermissionRepositoryInterface',
            'App\Repositories\PermissionRepository'
        );
        $this->app->bind(
            'App\Repositories\PermissionsDeRoleRepositoryInterface',
            'App\Repositories\PermissionsDeRoleRepository'

        );
        $this->app->bind(
            'App\Repositories\SectionsRepositoryInterface',
            'App\Repositories\SectionsRepository'
        );
        $this->app->bind(
            'App\Repositories\UserRepositoryInterface',
            'App\Repositories\UserRepository'
        );

        $this->app->bind(
            'App\Repositories\UserRepositoryInterface',
            'App\Repositories\UserRepository'
        );

        $this->app->bind(
            'App\Repositories\Media\MediaRepositoryInterface',
            'App\Repositories\Media\LogoRepository'
        );

        $this->app->bind(
            'App\Repositories\Media\MediaRepositoryInterface',
            'App\Repositories\Media\ImageRepository'
        );

        $this->app->bind(
            'App\Repositories\Media\MediaRepositoryInterface',
            'App\Repositories\Media\BulletinsRepository'
        );

        $this->app->bind(
            'App\Repositories\Media\MediaRepositoryInterface',
            'App\Repositories\Media\AudioRepository'
        );

        $this->app->bind(
            'App\Repositories\Media\MediaRepositoryInterface',
            'App\Repositories\Media\DocumentsRepository'
        );
        $this->app->bind(
            '',
            '\App\Repository\StringHelper\StringUtility'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
