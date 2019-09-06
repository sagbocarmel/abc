<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/5/19
 * Time: 8:10 AM
 */

namespace App\Repositories;


use App\Models\AnneeScolaireEtablissement;

interface AnneeScolaireEtablissementRepositoryInterface
{
    public function store(AnneeScolaireEtablissement $annetablissement, Array $inputs);
    public function update($codeEtablissement,$codeAnne, Array $inputs);
    public function find($codeEtablissement,$codeAnne);
    public function findAll($codeEtablissement);
    public function delete($codeEtablissement,$codeAnne);
}