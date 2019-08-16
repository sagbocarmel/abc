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
            'App\Repositories\ClasseRepository',
            'App\Repositories\ClasseRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\ElevesRepository',
            'App\Repositories\ElevesRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\EnseignantRepository',
            'App\Repositories\EnseignantRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\EtablissementRepository',
            'App\Repositories\EtablissementRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\EvaluationRepository',
            'App\Repositories\EvaluationRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\MatieresRepository',
            'App\Repositories\MatieresRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\MoyenneAnnuelleRepository',
            'App\Repositories\MoyenneAnnuelleRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\MoyenneMatiereRepository',
            'App\Repositories\MoyenneMatiereRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\MoyennePeriodeRepository',
            'App\Repositories\MoyennePeriodeRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\NotesRepository',
            'App\Repositories\NotesRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\ParentsRepository',
            'App\Repositories\ParentsRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\PermissionRepository',
            'App\Repositories\PermissionRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\PermissionsDeRoleRepository',
            'App\Repositories\PermissionsDeRoleRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\SectionsRepository',
            'App\Repositories\SectionsRepositoryInterface'
        );
        $this->app->bind(
            'App\Repositories\UserRepository',
            'App\Repositories\UserRepositoryInterface'
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
