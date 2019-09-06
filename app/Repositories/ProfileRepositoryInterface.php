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
    public function store(array $inputs);
    public function update($codeEtablissement, $telUtilisateur, array $inputs);
    public function find($codeEtablissement, $telUtilisateur);
    public function delete($codeEtablissement, $telUtilisateur);
    public function findAll($codeEtablissement);
}