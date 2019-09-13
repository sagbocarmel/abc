<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/10/19
 * Time: 12:11 PM
 */

namespace App\Repositories;


use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\MatieresDeClass;
use Illuminate\Database\Eloquent\Collection;

class MatieresDeClassesRepository implements MatieresDeClassesRepositoryInterface
{
    protected $matiereDeClasse;

    /**
     * MatieresDeClassesRepository constructor.
     * @param $matiereDeClasse
     */
    public function __construct(MatieresDeClass $matiereDeClasse)
    {
        $this->matiereDeClasse = $matiereDeClasse;
    }


    public function store(array $inputs)
    {
        $this->matiereDeClasse = new MatieresDeClass();
        $this->matiereDeClasse->codeEtablissement = $inputs['codeEtablissement'];
        $this->matiereDeClasse->codeAnnee = $inputs['codeAnnee'];
        $this->matiereDeClasse->niveau = $inputs['niveau'];
        $this->matiereDeClasse->codeClasse = $inputs['codeClasse'];
        $this->matiereDeClasse->codeMatiere = $inputs['codeMatiere'];
        $this->matiereDeClasse->matriculeEnseignant = $inputs['matriculeEnseignant'];
        $this->matiereDeClasse->coefficient = $inputs['coefficient'];
        $this->matiereDeClasse->save();
        return $this->matiereDeClasse;
    }

    public function update($codeEtablissement, $codeAnnee, $niveau, $codeClasse, $codeMatiere, array $inputs)
    {
        $this->matiereDeClasse = MatieresDeClass::
        where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('codeMatiere',$codeMatiere)->first();
        $this->matiereDeClasse->codeEtablissement = $inputs['codeEtablissement'];
        $this->matiereDeClasse->codeAnnee = $inputs['codeAnnee'];
        $this->matiereDeClasse->niveau = $inputs['niveau'];
        $this->matiereDeClasse->codeClasse = $inputs['codeClasse'];
        $this->matiereDeClasse->codeMatiere = $inputs['codeMatiere'];
        $this->matiereDeClasse->matriculeEnseignant = $inputs['matriculeEnseignant'];
        $this->matiereDeClasse->coefficient = $inputs['coefficient'];
        $this->matiereDeClasse->save();
        return $this->matiereDeClasse;
    }

    public function find($codeEtablissement, $codeAnnee, $niveau, $codeClasse, $codeMatiere)
    {
        return MatieresDeClass::
        where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('codeMatiere',$codeMatiere)->firstOrFail();
    }

    public function delete($codeEtablissement, $codeAnnee, $niveau, $codeClasse, $codeMatiere)
    {
        MatieresDeClass::
        where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('codeMatiere',$codeMatiere)->delete();
    }

    public function findAllMatiereByClasse($codeEtablissement, $codeAnnee, $niveau, $codeClasse)
    {
        $matiereDeClasses = MatieresDeClass::
        where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->get();

        $matieres = new Collection();
        foreach ($matiereDeClasses as $matiereDeClasse)
        {
            $matiere=Matiere::where('codeMatiere',$matiereDeClasse->codeMatiere)->first();
            $matieres->push($matiere);
        }
        return $matieres;
    }

    public function findAllMatiereByEnseignant($codeEtablissement, $codeAnnee, $niveau, $matriculeEnseignant)
    {
        $matiereDeClasses = MatieresDeClass::
        where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->
        where('matriculeEnseignant',$matriculeEnseignant)->get();

        $matieres = new Collection();
        foreach ($matiereDeClasses as $matiereDeClasse)
        {
            $matiere=Matiere::where('codeMatiere',$matiereDeClasse->codeMatiere)->first();
            $matieres->push($matiere);
        }
        return $matieres;
    }

    public function findAllMatiereByNiveau($codeEtablissement, $codeAnnee, $niveau)
    {
        $matiereDeClasses = MatieresDeClass::
        where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->get();

        $matieres = new Collection();
        foreach ($matiereDeClasses as $matiereDeClasse)
        {
            $matiere=Matiere::where('codeMatiere',$matiereDeClasse->codeMatiere)->first();
            $matieres->push($matiere);
        }
        return $matieres;
    }

    public function findAllMatiereByClasseAndAnnee($codeEtablissement, $codeAnnee, $niveau, $codeClasse)
    {
        $matiereDeClasses = MatieresDeClass::
        where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->get();

        $matieres = new Collection();
        foreach ($matiereDeClasses as $matiereDeClasse)
        {
            $matiere=Matiere::where('codeMatiere',$matiereDeClasse->codeMatiere)->first();
            $matieres->push($matiere);
        }
        return $matieres;
    }

    public function findAllMatiereByNiveauAndAnnee($codeEtablissement, $codeAnnee, $niveau)
    {
        $matiereDeClasses = MatieresDeClass::
        where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->get();

        $matieres = new Collection();
        foreach ($matiereDeClasses as $matiereDeClasse)
        {
            $matiere=Matiere::where('codeMatiere',$matiereDeClasse->codeMatiere)->first();
            $matieres->push($matiere);
        }
        return $matieres;
    }

    public function findEnseignantAndMatiereByClasse($codeEtablissement, $codeAnnee, $niveau, $codeClasse)
    {
        $matiereDeClasses = MatieresDeClass::
        where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->get();

        $matieresEnseignant = new Collection();
        foreach ($matiereDeClasses as $matiereDeClasse)
        {
            $matiere=Matiere::where('codeMatiere',$matiereDeClasse->codeMatiere)->first();
            $enseignant = Enseignant::where('matriculeEnseignant',$matiereDeClasse->matriculeEnseignant)->first();
            $element = ["matiere" => $matiere,
                "enseignant" => $enseignant];
            $matieresEnseignant->push($element);
        }
        return $matieresEnseignant;
    }
}