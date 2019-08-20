<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:47 AM
 */

namespace App\Repositories;


interface SectionsRepositoryInterface
{
    public function store(Array $inputs);
    public function update($id, $inputs);
    public function find($id);
    public function findAll();
    public function delete($id);
}