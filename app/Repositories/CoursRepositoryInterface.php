<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/5/19
 * Time: 10:14 AM
 */

namespace App\Repositories;


interface CoursRepositoryInterface
{
    public function store(array $inputs);
    public function update($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere, $jourCours,array $inputs);
    public function find($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere, $jourCours);
    public function delete($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere, $jourCours);
    public function findAll($codeEtablissement, $codeAnnee);
    public function findAllByNiveau($codeEtablissement, $niveau, $codeAnnee);
    public function findAllByClasse($codeEtablissement, $niveau, $codeClasse, $codeAnnee);
    public function findAllByMatiere($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere);
}