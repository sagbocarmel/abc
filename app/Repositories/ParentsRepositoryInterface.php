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
    public function update($tel, Array $inputs);
    public function find($tel);
    public function delete($tel);
    public function findAll();

}