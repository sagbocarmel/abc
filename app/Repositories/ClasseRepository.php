<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:17 AM
 */

namespace App\Repositories;

use \App\Classe;
use Illuminate\Support\Facades\DB;

class ClasseRepository implements ClasseRepositoryInterface
{
    protected $classe;

    /**
     * ClasseRepository constructor.
     * @param $classe
     */
    public function __construct(Classe $classe)
    {
        $this->classe = $classe;
    }

    public function store(array $inputs)
    {
        // TODO: Implement store() method.
        $this->classe->nom = $inputs['nom'];
        $this->classe->description = $inputs['description'];
        $this->classe->section = $inputs['section'];
        $this->classe->serie = $inputs['serie'];
        $this->classe->idSection = $inputs['idSection'];
        $this->classe->idEtablissement = $inputs['idEtablissement'];
        $this->classe->save();
        $classe = $this->classe;
        return $classe;
    }

    public function update($id, array $inputs)
    {
        // TODO: Implement update() method.

        $this->classe = Classe::find($id);
        $this->classe->description = $inputs['description'];
        $this->classe->section = $inputs['section'];
        $this->classe->serie = $inputs['serie'];
        $this->classe->idSection = $inputs['idSection'];
        $this->classe->idEtablissement = $inputs['idEtablissement'];
        $this->classe->save();
    }

    public function findAllByEtablissement($idEtablissement)
    {
        // TODO: Implement findAllByEtablissement() method.
        return Classe::where('idEtablissement', $idEtablissement)->get();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return Classe::findOrFail($id);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        Classe::destroy($id);
    }

    public function findBySection($idSection)
    {
        // TODO: Implement findBySection() method.
        return Classe::where('idSection', $idSection)->get();
    }
}