<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:27 AM
 */

namespace App\Repositories;


use App\Eleve;
use Illuminate\Support\Facades\DB;

class ElevesRepository implements ElevesRepositoryInterface
{
    protected $eleve;

    /**
     * ElevesRepository constructor.
     * @param $eleve
     */
    public function __construct(Eleve $eleve)
    {
        $this->eleve = $eleve;
    }


    public function store(array $inputs)
    {
        // TODO: Implement store() method.
        $this->eleve->nom = $inputs['nom'];
        $this->eleve->prenoms = $inputs['prenoms'];
        $this->eleve->sexe = $inputs['sexe'];
        $this->eleve->email = $inputs['email'];
        $this->eleve->tel1 = $inputs['tel1'];
        $this->eleve->tel2 = $inputs['tel2'];
        $this->eleve->dateNaissance = $inputs['dateNaissance'];
        $this->eleve->adresse = $inputs['adresse'];
        $this->eleve->nationalite = $inputs['nationalite'];
        $this->eleve->photo = $inputs['photo'];
        $this->eleve->infoSup = $inputs['infoSup'];
        $this->eleve->matricule = $inputs['matricule'];
        $this->eleve->idUtilisateur = $inputs['idUtilisateur'];
        $this->eleve->idClasse = $inputs['idClasse'];
        $this->eleve->save();
        $eleve = $this->eleve;
        return $eleve;
    }

    public function updateById($id, array $inputs)
    {
        // TODO: Implement updateById() method.
        $this->eleve = Eleve::where('id',$id)->get();
        $this->eleve->nom = $inputs['nom'];
        $this->eleve->prenoms = $inputs['prenoms'];
        $this->eleve->sexe = $inputs['sexe'];
        $this->eleve->email = $inputs['email'];
        $this->eleve->tel1 = $inputs['tel1'];
        $this->eleve->tel2 = $inputs['tel2'];
        $this->eleve->dateNaissance = $inputs['dateNaissance'];
        $this->eleve->adresse = $inputs['adresse'];
        $this->eleve->nationalite = $inputs['nationalite'];
        $this->eleve->photo = $inputs['photo'];
        $this->eleve->infoSup = $inputs['infoSup'];
        $this->eleve->matricule = $inputs['matricule'];
        $this->eleve->idUtilisateur = $inputs['idUtilisateur'];
        $this->eleve->idClasse = $inputs['idClasse'];
        $this->eleve->save();
    }

    public function updateByMatricule($matricule, array $inputs)
    {
        // TODO: Implement updateByMatricule() method.
        $this->eleve = Eleve::where('matricule',$matricule)->get();
        $this->eleve->nom = $inputs['nom'];
        $this->eleve->prenoms = $inputs['prenoms'];
        $this->eleve->sexe = $inputs['sexe'];
        $this->eleve->email = $inputs['email'];
        $this->eleve->tel1 = $inputs['tel1'];
        $this->eleve->tel2 = $inputs['tel2'];
        $this->eleve->dateNaissance = $inputs['dateNaissance'];
        $this->eleve->adresse = $inputs['adresse'];
        $this->eleve->nationalite = $inputs['nationalite'];
        $this->eleve->photo = $inputs['photo'];
        $this->eleve->infoSup = $inputs['infoSup'];
        $this->eleve->matricule = $inputs['matricule'];
        $this->eleve->idUtilisateur = $inputs['idUtilisateur'];
        $this->eleve->idClasse = $inputs['idClasse'];
        $this->eleve->save();
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
        return Eleve::where('id',$id)->get();
    }

    public function findByMatricule($matricule)
    {
        // TODO: Implement findByMatricule() method.
        return Eleve::where('matricule',$matricule)->get();
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
        DB::table('48c5m_eleves')->where('id',$id)->delete();
    }

    public function deleteByMatricule($matricule)
    {
        // TODO: Implement deleteByMatricule() method.
        DB::table('48c5m_eleves')->where('matricule',$matricule)->delete();
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
        return Eleve::all();
    }


    public function findAllByIdClasse($id)
    {
        // TODO: Implement findAllByIdClasse() method.
        return Eleve::where('idClasse', $id);
    }
}