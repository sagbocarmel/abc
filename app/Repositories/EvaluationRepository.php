<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:50 AM
 */

namespace App\Repositories;


use App\Evaluation;

class EvaluationRepository implements EvaluationRepositoryInterface
{
    protected $evaluation;

    /**
     * EvaluationRepository constructor.
     * @param $evaluation
     */
    public function __construct(Evaluation $evaluation)
    {
        $this->evaluation = $evaluation;
    }


    public function store(array $inputs)
    {
        // TODO: Implement store() method.
        $this->evaluation->titre = $inputs['titre'];
        $this->evaluation->type = $inputs['type'];
        $this->evaluation->date = $inputs['date'];
        $this->evaluation->duree = $inputs['duree'];
        $this->evaluation->periode = $inputs['periode'];
        $this->evaluation->idClasse = $inputs['idClasse'];
        $this->evaluation->idMatiere = $inputs['idMatiere'];
        $this->evaluation->save();
        $evaluation = $this->evaluation;
        return $evaluation;
    }

    public function update($id, array $inputs)
    {
        // TODO: Implement update() method.
        $this->evaluation = Evaluation::find($id);
        $this->evaluation->titre = $inputs['titre'];
        $this->evaluation->type = $inputs['type'];
        $this->evaluation->date = $inputs['date'];
        $this->evaluation->duree = $inputs['duree'];
        $this->evaluation->periode = $inputs['periode'];
        $this->evaluation->idClasse = $inputs['idClasse'];
        $this->evaluation->idMatiere = $inputs['idMatiere'];
        $this->evaluation->save();
    }

    public function findAllByClasse($idClasse)
    {
        // TODO: Implement findAllByClasse() method.
        return Evaluation::where('idClasse', $idClasse)->get();
    }

    public function findAllByMatiere($idMatiere)
    {
        // TODO: Implement findAllByMatiere() method.
        return Evaluation::where('idMatiere', $idMatiere)->get();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return Evaluation::findOrFail($id);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        Evaluation::destroy($id);
    }
}