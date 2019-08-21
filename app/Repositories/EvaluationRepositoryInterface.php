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
    public function update($id, Array $inputs);
    public function findAllByClasse($idClasse);
    public function findAllByMatiere($idMatiere);
    public function find($id);
    public function delete($id);
}