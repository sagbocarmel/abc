<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:29 AM
 */

namespace App\Repositories;


use App\Models\Enseignant;

class EnseignantRepository implements EnseignantRepositoryInterface
{
    protected $enseignant;

    /**
     * EnseignantRepository constructor.
     * @param Enseignant $enseignant
     */
    public function __construct(Enseignant $enseignant)
    {
        $this->enseignant = $enseignant;
    }


    public function store(array $inputs)
    {
        $this->enseignant = new Enseignant();
        $this->enseignant->nom = $inputs['nom'];
        $this->enseignant->prenoms = $inputs['prenoms'];
        $this->enseignant->sexe = $inputs['sexe'];
        $this->enseignant->email = $inputs['email'];
        $this->enseignant->tel = $inputs['tel'];
        $this->enseignant->tel2 = $inputs['tel2'];
        $this->enseignant->dateNaissance = $inputs['dateNaissance'];
        $this->enseignant->adresse = $inputs['adresse'];
        $this->enseignant->nationalite = $inputs['nationalite'];
        $this->enseignant->photo = $inputs['photo'];
        $this->enseignant->infoSup = $inputs['infoSup'];
        $this->enseignant->diplome = $inputs['diplome'];
        $this->enseignant->contactUrgence = $inputs['contactUrgence'];
        $this->enseignant->mode = $inputs['mode'];
        $this->enseignant->cv = $inputs['cv'];
        $this->enseignant->matriculeEnseignant = $inputs['matriculeEnseignant'];
        $this->enseignant->save();
        return $this->enseignant;
    }

    public function update($matriculeEnseignant, array $inputs)
    {
        $this->enseignant = Enseignant::where('matriculeEnseignant',$matriculeEnseignant)->first();
        $this->enseignant->nom = $inputs['nom'];
        $this->enseignant->prenoms = $inputs['prenoms'];
        $this->enseignant->sexe = $inputs['sexe'];
        $this->enseignant->email = $inputs['email'];
        $this->enseignant->tel = $inputs['tel'];
        $this->enseignant->tel2 = $inputs['tel2'];
        $this->enseignant->dateNaissance = $inputs['dateNaissance'];
        $this->enseignant->adresse = $inputs['adresse'];
        $this->enseignant->nationalite = $inputs['nationalite'];
        $this->enseignant->photo = $inputs['photo'];
        $this->enseignant->infoSup = $inputs['infoSup'];
        $this->enseignant->diplome = $inputs['diplome'];
        $this->enseignant->contactUrgence = $inputs['contactUrgence'];
        $this->enseignant->mode = $inputs['mode'];
        $this->enseignant->cv = $inputs['cv'];
        $this->enseignant->matriculeEnseignant = $inputs['matriculeEnseignant'];
        $this->enseignant->save();
        return $this->enseignant;
    }

    public function updateByTelephone($tel, array $inputs)
    {
        $this->enseignant = Enseignant::where('tel',$tel)->first();
        $this->enseignant->nom = $inputs['nom'];
        $this->enseignant->prenoms = $inputs['prenoms'];
        $this->enseignant->sexe = $inputs['sexe'];
        $this->enseignant->email = $inputs['email'];
        $this->enseignant->tel = $inputs['tel'];
        $this->enseignant->tel2 = $inputs['tel2'];
        $this->enseignant->dateNaissance = $inputs['dateNaissance'];
        $this->enseignant->adresse = $inputs['adresse'];
        $this->enseignant->nationalite = $inputs['nationalite'];
        $this->enseignant->photo = $inputs['photo'];
        $this->enseignant->infoSup = $inputs['infoSup'];
        $this->enseignant->diplome = $inputs['diplome'];
        $this->enseignant->contactUrgence = $inputs['contactUrgence'];
        $this->enseignant->mode = $inputs['mode'];
        $this->enseignant->cv = $inputs['cv'];
        $this->enseignant->matriculeEnseignant = $inputs['matriculeEnseignant'];
        $this->enseignant->save();
        return $this->enseignant;
    }

    public function updateByEmail($email, array $inputs)
    {
        $this->enseignant = Enseignant::where('email',$email)->first();
        $this->enseignant->nom = $inputs['nom'];
        $this->enseignant->prenoms = $inputs['prenoms'];
        $this->enseignant->sexe = $inputs['sexe'];
        $this->enseignant->email = $inputs['email'];
        $this->enseignant->tel = $inputs['tel'];
        $this->enseignant->tel2 = $inputs['tel2'];
        $this->enseignant->dateNaissance = $inputs['dateNaissance'];
        $this->enseignant->adresse = $inputs['adresse'];
        $this->enseignant->nationalite = $inputs['nationalite'];
        $this->enseignant->photo = $inputs['photo'];
        $this->enseignant->infoSup = $inputs['infoSup'];
        $this->enseignant->diplome = $inputs['diplome'];
        $this->enseignant->contactUrgence = $inputs['contactUrgence'];
        $this->enseignant->mode = $inputs['mode'];
        $this->enseignant->cv = $inputs['cv'];
        $this->enseignant->matriculeEnseignant = $inputs['matriculeEnseignant'];
        $this->enseignant->save();
        return $this->enseignant;
    }

    public function find($matriculeEnseignant)
    {
        return Enseignant::where('matriculeEnseignant',$matriculeEnseignant)->first();
    }

    public function findByEmail($email)
    {
        return Enseignant::where('email',$email)->first();
    }

    public function findByTelephone($tel)
    {
        return Enseignant::where('tel',$tel)->first();
    }

    public function delete($id)
    {
        Enseignant::where('matriculeEnseignant',$id)->delete();
    }

    public function deleteByEmail($email)
    {
        Enseignant::where('email',$email)->delete();
    }

    public function findAll()
    {
        return Enseignant::all();
    }
}