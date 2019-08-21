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
    public function update($idEvaluation, $idEleve,$matricule, Array $inputs);
    public function findAllByIdEvaluation($idEvaluation);
    public function findAllByIdEleve($idEleve);
    public function findAllByMatricule($matricule);
    public function find($idEvaluation, $idEleve, $matricule);
    public function delete($idEvaluation, $idEleve, $matricule);
}