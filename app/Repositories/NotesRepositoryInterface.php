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
    public function update($idEleve,$idEvaluation,$matriculeEleve, Array $inputs);
    public function findAllByMatricule($idMatricule);
    public function findAllByEvaluation($idEvaluation);
    public function findByIdAllEleve($idEleve);
    public function find($idEleve,$idEvaluation,$matriculeEleve);
    public function delete($idEleve,$idEvaluation,$matriculeEleve);
}