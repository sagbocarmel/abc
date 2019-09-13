<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/10/19
 * Time: 9:53 AM
 */

namespace App\Repositories;


use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\EnseignantClasse;
use Illuminate\Database\Eloquent\Collection;

class EnseignantClasseRepository implements EnseignantClasseRepositoryInterface
{

    protected $enseignantsClasse;
    protected $enseignant;
    protected $classe;

    /**
     * EnseignantClasseRepository constructor.
     * @param $enseignantsClasse
     * @param $enseignant
     * @param $classe
     */
    public function __construct(EnseignantClasse $enseignantsClasse, Enseignant $enseignant, Classe $classe)
    {
        $this->enseignantsClasse = $enseignantsClasse;
        $this->enseignant = $enseignant;
        $this->classe = $classe;
    }


    public function store(array $inputs)
    {
        $this->enseignantsClasse = new EnseignantClasse();
        $this->enseignantsClasse->codeEtablissement = $inputs['codeEtablissement'];
        $this->enseignantsClasse->matriculeEnseignant = $inputs['matriculeEnseignant'];
        $this->enseignantsClasse->codeClasse = $inputs['codeClasse'];
        $this->enseignantsClasse->niveau = $inputs['niveau'];
        $this->enseignantsClasse->save();
        return $this->enseignantsClasse;
    }

    public function update($codeEtablissement, $matriculeEnseignant, $codeClasse, $niveau, array $inputs)
    {
        $this->enseignantsClasse = EnseignantClasse::where('codeEtablissement',$codeEtablissement)->
        where('matriculeEnseignant',$matriculeEnseignant)->
        where('codeClasse',$codeClasse)->
        where('niveau',$niveau)->first();
        $this->enseignantsClasse->codeEtablissement = $inputs['codeEtablissement'];
        $this->enseignantsClasse->matriculeEnseignant = $inputs['matriculeEnseignant'];
        $this->enseignantsClasse->codeClasse = $inputs['codeClasse'];
        $this->enseignantsClasse->niveau = $inputs['niveau'];
        $this->enseignantsClasse->save();
        return $this->enseignantsClasse;
    }

    public function delete($codeEtablissement, $matriculeEnseignant, $codeClasse, $niveau)
    {
        $this->enseignantsClasse = EnseignantClasse::where('codeEtablissement',$codeEtablissement)->
        where('matriculeEnseignant',$matriculeEnseignant)->
        where('codeClasse',$codeClasse)->
        where('niveau',$niveau)->delete();
    }

    public function find($codeEtablissement, $matriculeEnseignant, $codeClasse, $niveau)
    {
        return $this->enseignantsClasse = EnseignantClasse::where('codeEtablissement',$codeEtablissement)->
        where('matriculeEnseignant',$matriculeEnseignant)->
        where('codeClasse',$codeClasse)->
        where('niveau',$niveau)->firstOrFail();
    }

    public function findAll()
    {
        return EnseignantClasse::all();
    }

    public function findAllEnseignantByEtablissement($codeEtablissement)
    {
        $enseignantClasses = EnseignantClasse::where('codeEtablissement',$codeEtablissement)->get();

        $enseignants = new Collection();
        foreach ($enseignantClasses as $enseignantClasse)
        {
            $enseignant =EnseignantClasse::where('matriculeEnseignant',$enseignantClasse->matriculeEnseignant)->
            first();
            $enseignants->push($enseignant);
        }
        return $enseignants;
    }

    public function findAllEnseignantByClasse($codeEtablissement, $codeClasse, $niveau)
    {
        $enseignantClasses = EnseignantClasse::where('codeEtablissement',$codeEtablissement)->
        where('codeClasse',$codeClasse)->
        where('niveau',$niveau)->get();

        $enseignants = new Collection();
        foreach ($enseignantClasses as $enseignantClasse)
        {
            $enseignant =EnseignantClasse::where('matriculeEnseignant',$enseignantClasse->matriculeEnseignant)->
            first();
            $enseignants->push($enseignant);
        }
        return $enseignants;
    }

    public function findAllEnseignantByNiveau($codeEtablissement, $niveau)
    {
        $enseignantClasses  = EnseignantClasse::where('codeEtablissement',$codeEtablissement)->
        where('niveau',$niveau)->get();

        $enseignants = new Collection();
        foreach ($enseignantClasses as $enseignantClasse)
        {
            $enseignant =EnseignantClasse::where('matriculeEnseignant',$enseignantClasse->matriculeEnseignant)->
            first();
            $enseignants->push($enseignant);
        }
        return $enseignants;
    }

    public function findAllClasseByEnseignant($codeEtablissement, $matriculeEnseignant, $niveau)
    {
        $enseignantClasses = $this->enseignantsClasse = EnseignantClasse::where('codeEtablissement',$codeEtablissement)->
        where('matriculeEnseignant',$matriculeEnseignant)->
        where('niveau',$niveau)->get();

        $classes = new Collection();
        foreach ($enseignantClasses as $enseignantClasse)
        {
            $classe =Classe::where('codeEtablissement',$enseignantClasse->codeEtablissement)->
            where('niveau',$enseignantClasse->niveau)->
            where('codeClasse',$enseignantClasse->codeClasse)->first();
            $classes->push($classe);
        }
        return $classes;
    }
}