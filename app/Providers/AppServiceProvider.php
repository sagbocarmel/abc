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

        $this->app->bind(
            'App\Repositories\ClasseRepositoryInterface',
            'App\Repositories\ClasseRepository'
        );
        $this->app->bind(
            'App\Repositories\ElevesRepositoryInterface',
            'App\Repositories\ElevesRepository'
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
