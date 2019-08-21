<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:25 AM
 */

namespace App\Repositories;


use App\Matiere;

class MatieresRepository implements MatieresRepositoryInterface
{
    protected  $matiere;

    /**
     * MatieresRepository constructor.
     * @param $matiere
     */
    public function __construct(Matiere $matiere)
    {
        $this->matiere = $matiere;
    }

    public function store(array $inputs)
    {
        // TODO: Implement store() method.
        $this->matiere->nom = $inputs['nom'];
        $this->matiere->description = $inputs['description'];
        $this->matiere->type = $inputs['type'];
        $this->matiere->save();
        $matiere = $this->matiere;
        return $matiere;
    }

    public function update($id, array $inputs)
    {
        // TODO: Implement update() method.
        $this->matiere = Matiere::find($id);
        $this->matiere->nom = $inputs['nom'];
        $this->matiere->description = $inputs['description'];
        $this->matiere->type = $inputs['type'];
        $this->matiere->save();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return Matiere::findOrFail($id);
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
        return Matiere::all();
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        Matiere::destroy($id);
    }
}