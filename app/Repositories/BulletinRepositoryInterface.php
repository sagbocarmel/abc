<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 9:25 PM
 */

namespace App\Repositories;


interface BulletinRepositoryInterface
{
    public function store($inputs);
    public function update($codeEtablissement, $codeAnnee, $matriculeEleve, $periode, $input);
    public function find($codeEtablissement, $codeAnnee, $matriculeEleve, $periode);
    public function findAll($codeEtablissement, $codeAnnee, $periode);
    public function delete($codeEtablissement, $codeAnnee, $matriculeEleve, $periode);
}