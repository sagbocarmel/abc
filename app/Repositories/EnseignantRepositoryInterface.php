<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:30 AM
 */

namespace App\Repositories;


interface EnseignantRepositoryInterface
{
    public function store(Array $inputs);
    public function update($matriculeEnseignant,Array $inputs);
    public function updateByTelephone($tel,Array $inputs);
    public function updateByEmail($email,Array $inputs);
    public function find($matriculeEnseignant);
    public function findByEmail($email);
    public function findByTelephone($tel);
    public function delete($id);
    public function deleteByEmail($id);
    public function findAll();
}