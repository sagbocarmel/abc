<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:56 AM
 */

namespace App\Repositories;


interface PermissionsDeRoleRepositoryInterface
{
     public function store(Array $inputs);
     public function update($idRole,$idPermission,Array $inputs);
     public function findByPermission($id);
     public function findByRole($id);
     public function find($idRole, $idPermission);
     public function delete($idRole,$idPermission);
     public function findAll();
}