<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:27 AM
 */

namespace App\Repositories;


interface ElevesRepositoryInterface
{
    public function store(Array $inputs);
    public function update($matriculeEleve,Array $inputs);
    public function find($matriculeEleve);
    public function delete($matriculeEleve);
    public function findAll();

    public function storeInscription(Array $inputs);
    public function updateInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee,$matriculeEleve,Array $inputs);
    public function findInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $matriculeEleve);
    public function deleteInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee,$matriculeEleve);
    public function findAllInscription($codeEtablissement, $niveau, $codeClasse, $codeAnne);

    public function findAllInscriptionByNiveau($codeEtablissement, $niveau, $codeAnne);
    public function findAllInscriptionByAnnee($codeEtablissement, $codeAnne);
}