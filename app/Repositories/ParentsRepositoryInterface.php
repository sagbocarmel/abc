<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:43 AM
 */

namespace App\Repositories;


interface ParentsRepositoryInterface
{
    public function store(Array $inputs);
    public function update($id, Array $inputs);
    public function findByIdUtilisateur($idUtilisateur);
    public function find($id);
    public function delete($id);
    public function findAll();
}