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
    public function updateByMatricule($matricule,$id,Array $inputs);
    public function findById($id);
    public function findByMatricule($matricule);
    public function deleteById($id);
    public function deleteByMatricule($matricule);
    public function findAll();
    public function findAllByIdClasse($id);
}