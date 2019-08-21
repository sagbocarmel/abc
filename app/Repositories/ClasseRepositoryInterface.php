<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:18 AM
 */

namespace App\Repositories;


interface ClasseRepositoryInterface
{
    public function store(Array $inputs);
    public function update($id, Array $inputs);
    public function findAllByEtablissement($idEtablissement);
    public function find($id);
    public function delete($id);
    public function findBySection($idSection);

}