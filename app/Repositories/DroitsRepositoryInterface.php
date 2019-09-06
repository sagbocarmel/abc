<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/5/19
 * Time: 10:13 AM
 */

namespace App\Repositories;


interface DroitsRepositoryInterface
{
    public function store(Array $inputs);
    public function update($codeRole,$codeElement,$droit, Array $inputs);
    public function find($codeRole,$codeElement,$droit);
    public function findAll($codeRole,$codeElement);
    public function delete($codeRole,$codeElement,$droit);
    public function deleteAll($codeRole,$codeElement);
}