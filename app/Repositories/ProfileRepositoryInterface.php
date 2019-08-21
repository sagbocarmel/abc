<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 7:00 PM
 */

namespace App\Repositories;


use PhpParser\Node\Expr\Array_;

interface ProfileRepositoryInterface
{
    public function store(Array $inputs);
    public function update($id, Array_$inputs);
    public function find($id);
    public function delete($id);
    public function findAll();
}