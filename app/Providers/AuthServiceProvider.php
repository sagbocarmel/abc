<?php

namespace App\Providers;

use App\Models\AnneeScolaire;
use App\Models\AnneeScolaireEtablissement;
use App\Models\Appreciation;
use App\Models\Bulletin;
use App\Models\Classe;
use App\Models\Cour;
use App\Models\Droit;
use App\Models\Element;
use App\Models\Eleve;
use App\Models\Enseignant;
use App\Models\EnseignantClasse;
use App\Models\Etablissement;
use App\Models\Evaluation;
use App\Models\Inscription;
use App\Models\Matiere;
use App\Models\MoyenneAnnuelle;
use App\Models\MoyenneMatiere;
use App\Models\MoyennePeriode;
use App\Models\Niveau;
use App\Models\Note;
use App\Models\ParentEleve;
use App\Models\Parents;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Utilisateur;
use App\Policies\AnneeScolaireEtablissementPolicy;
use App\Policies\AnneeScolairePolicy;
use App\Policies\AppreciationPolicy;
use App\Policies\BulletinPolicy;
use App\Policies\CourPolicy;
use App\Policies\DroitPolicy;
use App\Policies\ElementPolicy;
use App\Policies\ElevePolicy;
use App\Policies\EnseignantClassePolicy;
use App\Policies\EnseignantPolicy;
use App\Policies\EtablissementPolicy;
use App\Policies\InscriptionPolicy;
use App\Policies\MatierePolicy;
use App\Policies\MoyenneAnnuellePolicy;
use App\Policies\MoyenneMatierePolicy;
use App\Policies\MoyennePeriodePolicy;
use App\Policies\NiveauPolicy;
use App\Policies\NotePolicy;
use App\Policies\ParentElevePolicy;
use App\Policies\ParentsPolicy;
use App\Policies\ProfilePolicy;
use App\Policies\RolePolicy;
use App\Policies\UtilisateurPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        AnneeScolaire::class => AnneeScolairePolicy::class,
        AnneeScolaireEtablissement::class => AnneeScolaireEtablissementPolicy::class,
        Appreciation::class =>AppreciationPolicy::class,
        Bulletin::class => BulletinPolicy::class,
        Classe::class => Classe::class,
        Cour::class => CourPolicy::class,
        Droit::class => DroitPolicy::class,
        Element::class => ElementPolicy::class,
        Eleve::class => ElevePolicy::class,
        Enseignant::class => EnseignantPolicy::class,
        EnseignantClasse::class => EnseignantClassePolicy::class,
        Etablissement::class => EtablissementPolicy::class,
        Evaluation::class => Evaluation::class,
        Inscription::class => InscriptionPolicy::class,
        Matiere::class => MatierePolicy::class,
        MoyennePeriode::class => MoyennePeriodePolicy::class,
        MoyenneMatiere::class => MoyenneMatierePolicy::class,
        MoyenneAnnuelle::class => MoyenneAnnuellePolicy::class,
        Niveau::class => NiveauPolicy::class,
        Note::class => NotePolicy::class,
        ParentEleve::class => ParentElevePolicy::class,
        Parents::class => ParentsPolicy::class,
        Profile::class => ProfilePolicy::class,
        Role::class => RolePolicy::class,
        Utilisateur::class => UtilisateurPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        //
    }
}
