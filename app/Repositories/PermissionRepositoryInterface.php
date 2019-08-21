<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:46 AM
 */

namespace App\Repositories;


interface PermissionRepositoryInterface
{
    public function store(Array $inputs);
    public function update($id, Array $inputs);
    public function find($id);
    public function delete($id);
    public function findAll();
}