<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:26 AM
 */

namespace App\Repositories;


interface MatieresRepositoryInterface
{
    public function store(Array $inputs);
    public function update($id, Array $inputs);
    public function find($id);
    public function findAll();
    public function delete($id);
}