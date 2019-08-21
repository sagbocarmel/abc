<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:26 AM
 */

namespace App\Repositories;


class NotesRepository implements NotesRepositoryInterface
{

    public function store(array $inputs)
    {
        // TODO: Implement store() method.
    }

    public function update($idEleve, $idEvaluation, $matriculeEleve, array $inputs)
    {
        // TODO: Implement update() method.
    }

    public function findAllByMatricule($idMatricule)
    {
        // TODO: Implement findAllByMatricule() method.
    }

    public function findAllByEvaluation($idEvaluation)
    {
        // TODO: Implement findAllByEvaluation() method.
    }

    public function findByIdAllEleve($idEleve)
    {
        // TODO: Implement findByIdAllEleve() method.
    }

    public function find($idEleve, $idEvaluation, $matriculeEleve)
    {
        // TODO: Implement find() method.
    }

    public function delete($idEleve, $idEvaluation, $matriculeEleve)
    {
        // TODO: Implement delete() method.
    }
}