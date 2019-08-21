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
    public function update($id,Array $inputs);
    public function find($id);
    public function findByEmail($email);
    public function delete($id);
    public function deleteByEmail($id);
    public function findAll();
}