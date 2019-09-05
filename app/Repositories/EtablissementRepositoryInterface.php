<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:52 AM
 */

namespace App\Repositories;


use App\Etablissement;

interface EtablissementRepositoryInterface
{
    public function save(Array $inputs);
    public function find($id);
    public function update($id, Array $inputs);
    public function delete($id);
    public function findAll();
}