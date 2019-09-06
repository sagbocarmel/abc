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
    public function update($codeEtablissement, $niveau, $codeClasse, Array $inputs);
    public function findAllByEtablissement($codeEtablissement);
    public function find($codeEtablissement, $niveau, $codeClasse);
    public function delete($codeEtablissement, $niveau, $codeClasse);
    public function findBySection($codeEtablissement,$codeSection);
    public function findByNiveau($codeEtablissement, $niveau);
}