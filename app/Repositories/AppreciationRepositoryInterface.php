<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 9:16 PM
 */

namespace App\Repositories;


use PhpParser\Node\Expr\Array_;

interface AppreciationRepositoryInterface
{
    public function store(Array $inputs);
    public function update($codeEtablissement,$codeAnnee,$matriculeEleve,$niveau,$codeClasse,$codeMatiere, $codeEvaluation,$periode, Array $inputs);
    public function find($codeEtablissement,$codeAnnee,$matriculeEleve,$niveau,$codeClasse,$codeMatiere, $codeEvaluation,$periode);
    public function delete($codeEtablissement,$codeAnnee,$matriculeEleve,$niveau,$codeClasse,$codeMatiere, $codeEvaluation,$periode);
}