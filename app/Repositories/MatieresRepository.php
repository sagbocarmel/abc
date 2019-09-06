<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:25 AM
 */

namespace App\Repositories;


use App\Models\Matiere;

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
        $this->matiere->codeMatiere = $inputs['codeMatiere'];
        $this->matiere->type = $inputs['type'];
        $this->matiere->save();
        $this->matiere;
        return $this->matiere;
    }

    public function update($id, array $inputs)
    {
        // TODO: Implement update() method.
        $this->matiere = Matiere::find($id);
        $this->matiere->nom = $inputs['nom'];
        $this->matiere->description = $inputs['description'];
        $this->matiere->type = $inputs['type'];
        $this->matiere->save();
        return $this->matiere;
    }

    public function find($id)
    {
        return Matiere::findOrFail($id);
    }

    public function findAll()
    {
        return Matiere::all();
    }

    public function delete($id)
    {
        Matiere::destroy($id);
    }
}