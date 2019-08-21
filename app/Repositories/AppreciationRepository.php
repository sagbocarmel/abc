<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 9:15 PM
 */

namespace App\Repositories;


class AppreciationRepository implements AppreciationRepositoryInterface
{

    public function store(array $inputs)
    {
        // TODO: Implement store() method.
    }

    public function update($idEvaluation, $idEleve, $matricule, array $inputs)
    {
        // TODO: Implement update() method.
    }

    public function findAllByIdEvaluation($idEvaluation)
    {
        // TODO: Implement findAllByIdEvaluation() method.
    }

    public function findAllByIdEleve($idEleve)
    {
        // TODO: Implement findAllByIdEleve() method.
    }

    public function findAllByMatricule($matricule)
    {
        // TODO: Implement findAllByMatricule() method.
    }

    public function find($idEvaluation, $idEleve, $matricule)
    {
        // TODO: Implement find() method.
    }

    public function delete($idEvaluation, $idEleve, $matricule)
    {
        // TODO: Implement delete() method.
    }
}