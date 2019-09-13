<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/10/19
 * Time: 12:12 PM
 */

namespace App\Repositories;


interface MatieresDeClassesRepositoryInterface
{
    public function store(array $inputs);
    public function update($codeEtablissement,$codeAnnee,$niveau,$codeClasse,$codeMatiere, array $inputs);
    public function find($codeEtablissement,$codeAnnee,$niveau,$codeClasse,$codeMatiere);
    public function delete($codeEtablissement,$codeAnnee,$niveau,$codeClasse,$codeMatiere);

    public function findAllMatiereByClasse($codeEtablissement,$codeAnnee,$niveau,$codeClasse);
    public function findAllMatiereByEnseignant($codeEtablissement,$codeAnnee,$niveau,$matriculeEnseignant);
    public function findAllMatiereByNiveau($codeEtablissement,$codeAnnee,$niveau);
    public function findAllMatiereByClasseAndAnnee($codeEtablissement,$codeAnnee,$niveau,$codeClasse);
    public function findAllMatiereByNiveauAndAnnee($codeEtablissement,$codeAnnee,$niveau);

    public function findEnseignantAndMatiereByClasse($codeEtablissement,$codeAnnee,$niveau,$codeClasse);
}