<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/10/19
 * Time: 8:49 AM
 */

namespace App\Repositories;


interface ParentEleveRepositoryInterface
{
    public function store(Array $inputs);
    public function update($telParent, $matriculeEleve, Array $inputs);
    public function find($telParent,$matriculeEleve);
    public function findAllParentEleve($telParent);
    public function findAllEleveParent($matriculeEleve);
    public function delete($telParent, $matriculeEleve);
    public function findAll();
}