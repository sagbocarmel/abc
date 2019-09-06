<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/5/19
 * Time: 10:17 AM
 */

namespace App\Repositories;


use App\Models\Niveau;

interface NiveauRepositoryInterface
{
    public function store(Niveau $niveau, Array $inputs);
    public function update($codeEtablissement,$niveau, Array $inputs);
    public function find($codeEtablissement,$niveau);
    public function findAll($codeEtablissement);
    public function delete($codeEtablissement,$niveau);
}