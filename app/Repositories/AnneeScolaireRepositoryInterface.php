<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/5/19
 * Time: 8:05 AM
 */

namespace App\Repositories;


interface AnneeScolaireRepositoryInterface
{
    public function store($inputs);
    public function update($codeAnne, $input);
    public function find($id);
    public function findAll();
    public function delete($id);
}