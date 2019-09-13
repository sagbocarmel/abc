<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/10/19
 * Time: 9:54 AM
 */

namespace App\Repositories;


interface EnseignantClasseRepositoryInterface
{
    public function store(array $inputs);
    public function update($codeEtablissement,$matriculeEnseignant,$codeClasse,$niveau, array $inputs);
    public function delete($codeEtablissement,$matriculeEnseignant,$codeClasse,$niveau);
    public function find($codeEtablissement,$matriculeEnseignant,$codeClasse,$niveau);
    public function findAll();
    public function findAllEnseignantByEtablissement($codeEtablissement);
    public function findAllEnseignantByClasse($codeEtablissement,$codeClasse,$niveau);
    public function findAllEnseignantByNiveau($codeEtablissement, $niveau);

    public function findAllClasseByEnseignant($codeEtablissement,$matriculeEnseignant,$niveau);

}