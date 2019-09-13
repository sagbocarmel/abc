<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:27 AM
 */

namespace App\Repositories;


use App\Models\Eleve;
use App\Models\Inscription;
use Illuminate\Support\Facades\DB;

class ElevesRepository implements ElevesRepositoryInterface
{
    protected $eleve;
    protected $inscprition;

    /**
     * ElevesRepository constructor.
     * @param $eleve
     */
    public function __construct(Eleve $eleve, Inscription $inscprition)
    {
        $this->eleve = $eleve;
        $this->inscprition = $inscprition;
    }


    public function store(array $inputs)
    {
        // TODO: Implement store() method.
        $this->eleve->nom = $inputs['nom'];
        $this->eleve->prenoms = $inputs['prenoms'];
        $this->eleve->sexe = $inputs['sexe'];
        $this->eleve->email = $inputs['email'];
        $this->eleve->tel = $inputs['tel'];
        $this->eleve->tel2 = $inputs['tel2'];
        $this->eleve->dateNaissance = $inputs['dateNaissance'];
        $this->eleve->adresse = $inputs['adresse'];
        $this->eleve->nationalite = $inputs['nationalite'];
        $this->eleve->photo = $inputs['photo'];
        $this->eleve->infoSup = $inputs['infoSup'];
        $this->eleve->lieuNaissance = $inputs['lieuNaissance'];
        $this->eleve->matriculeEleve = $inputs['matriculeEleve'];
        $this->eleve->save();
        $eleve = $this->eleve;
        return $eleve;
    }


    public function update($matricule, array $inputs)
    {
        $this->eleve = Eleve::where('matriculeEleve',$matricule)->first();
        $this->eleve->nom = $inputs['nom'];
        $this->eleve->prenoms = $inputs['prenoms'];
        $this->eleve->sexe = $inputs['sexe'];
        $this->eleve->email = $inputs['email'];
        $this->eleve->tel = $inputs['tel'];
        $this->eleve->tel2 = $inputs['tel2'];
        $this->eleve->dateNaissance = $inputs['dateNaissance'];
        $this->eleve->adresse = $inputs['adresse'];
        $this->eleve->nationalite = $inputs['nationalite'];
        $this->eleve->photo = $inputs['photo'];
        $this->eleve->infoSup = $inputs['infoSup'];
        $this->eleve->lieuNaissance = $inputs['lieuNaissance'];
        $this->eleve->matriculeEleve = $inputs['matriculeEleve'];
        $this->eleve->save();
        return $this->eleve;
    }

    public function delete($matriculeEleve)
    {
        Eleve::where('matriculeEleve',$matriculeEleve)->delete();
    }

    public function findAll()
    {
        return Eleve::all();
    }


    public function find($matriculeEleve)
    {
        return Eleve::where('matriculeEleve',$matriculeEleve)->firstOrfail();
    }

    public function storeInscription(array $inputs)
    {
        $this->inscprition = new Inscription();
        $this->inscprition->matriculeEleve = $inputs['matriculeEleve'];
        $this->inscprition->codeEtablissement = $inputs['codeEtablissement'];
        $this->inscprition->niveau = $inputs['niveau'];
        $this->inscprition->codeAnnee = $inputs['codeAnnee'];
        $this->inscprition->codeClasse = $inputs['codeClasse'];
        $this->inscprition->dateInscription = $inputs['dateInscription'];
        $this->inscprition->save();
        return $this->inscprition;
    }

    public function updateInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $matriculeEleve, array $inputs)
    {
        $this->inscprition = Inscription::where('',$codeEtablissement)->
        where('',$niveau)->
        where('',$codeClasse)->
        where('',$codeAnnee)->
        where('',$matriculeEleve)->first();
        $this->inscprition->matriculeEleve = $inputs['matriculeEleve'];
        $this->inscprition->codeEtablissement = $inputs['codeEtablissement'];
        $this->inscprition->niveau = $inputs['niveau'];
        $this->inscprition->codeAnnee = $inputs['codeAnnee'];
        $this->inscprition->codeClasse = $inputs['codeClasse'];
        $this->inscprition->dateInscription = $inputs['dateInscription'];
        $this->inscprition->save();
        return $this->inscprition;
    }

    public function findInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $matriculeEleve)
    {
       return Inscription::where('codeEtablissement',$codeEtablissement)->
       where('niveau',$niveau)->
       where('codeClasse',$codeClasse)->
       where('codeAnnee',$codeAnnee)->
       where('matriculeEleve',$matriculeEleve)->first();
    }

    public function deleteInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $matriculeEleve)
    {
        Inscription::where('codeEtablissement',$codeEtablissement)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('codeAnnee',$codeAnnee)->
        where('matriculeEleve',$matriculeEleve)->delete();
    }

    public function findAllInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee)
    {
        return Inscription::where('codeEtablissement',$codeEtablissement)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('codeAnnee',$codeAnnee)->get();
    }

    public function findAllInscriptionByNiveau($codeEtablissement, $niveau, $codeAnnee)
    {
        return Inscription::where('codeEtablissement',$codeEtablissement)->
        where('niveau',$niveau)->
        where('codeAnnee',$codeAnnee)->get();
    }

    public function findAllInscriptionByAnnee($codeEtablissement, $codeAnnee)
    {
        return Inscription::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->get();
    }
}