<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 6:59 PM
 */

namespace App\Repositories;


interface RoleRepositoryInterface
{
    public function store(Array $inputs);
    public function update($id, Array $inputs);
    public function find($id);
    public function delete($id);
    public function findAll();
}