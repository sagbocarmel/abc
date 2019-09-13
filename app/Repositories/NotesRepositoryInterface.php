<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:26 AM
 */

namespace App\Repositories;


interface NotesRepositoryInterface
{
    public function store(Array $inputs);
    public function update($codeEtablissement,$codeAnnee,$codeMatiere,$codeEvaluation,$niveau,$codeClasse,$periode,$matriculeEleve, Array $inputs);
    public function find($codeEtablissement,$codeAnnee,$codeMatiere,$codeEvaluation,$niveau,$codeClasse,$periode,$matriculeEleve);
    public function delete($codeEtablissement,$codeAnnee,$codeMatiere,$codeEvaluation,$niveau,$codeClasse,$periode,$matriculeEleve);

    public function findAllByMatriculeEleve($codeEtablissement,$codeAnnee,$codeMatiere,$niveau,$codeClasse,$periode,$matriculeEleve);
    public function findAllByEvaluation($codeEtablissement,$codeAnnee,$codeMatiere,$codeEvaluation,$niveau,$codeClasse,$periode);
    public function findAllByMatriculeEleveAndMatiere($codeEtablissement,$codeAnnee,$codeMatiere,$niveau,$codeClasse,$periode,$matriculeEleve);
    public function findAllByClasseAndMatiere($codeEtablissement,$codeAnnee,$codeMatiere,$niveau,$codeClasse,$periode);
}