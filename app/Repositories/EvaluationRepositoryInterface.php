<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:50 AM
 */

namespace App\Repositories;


interface EvaluationRepositoryInterface
{
    public function store(Array $inputs);
    public function update($codeEtablissement,$codeAnnee, $niveau, $codeClasse, $codeMatiere, $codeEvaluation, $periode,Array $inputs);
    public function find($codeEtablissement,$codeAnnee, $niveau, $codeClasse, $codeMatiere, $codeEvaluation, $periode);
    public function delete($codeEtablissement,$codeAnnee, $niveau, $codeClasse, $codeMatiere, $codeEvaluation, $periode);

    public function findAllEvaluationByMatiere($codeEtablissement,$codeAnnee, $niveau, $codeClasse, $codeMatiere, $periode);
    public function findAllEvaluationByClasse($codeEtablissement,$codeAnnee, $niveau, $codeClasse, $periode);
    public function findAllEvaluationByPeriode($codeEtablissement,$codeAnnee, $niveau, $periode);
    public function findAllEvaluationByAnnee($codeEtablissement,$codeAnnee, $niveau);
}