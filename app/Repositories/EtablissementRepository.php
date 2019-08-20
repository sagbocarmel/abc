<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:51 AM
 */

namespace App\Repositories;


use App\Etablissement;
use PhpParser\Node\Expr\Array_;

class EtablissementRepository implements EtablissementRepositoryInterface
{
    protected $etablissement;

    /**
     * EtablissementRepository constructor.
     * @param $etablissement
     */
    public function __construct(Etablissement $etablissement)
    {
        $this->etablissement = $etablissement;
    }

    public function save(Array $inputs)
    {
        // TODO: Implement save() method.
        $etablissement = new $this->etablissement;
        $this->store($etablissement, $inputs);

        return $etablissement;
    }

    public function store(Etablissement $etablissement, Array $inputs)
    {
        $etablissement->nom = $inputs['nom'];
        $etablissement->description = $inputs['description'];
        $etablissement->type = $inputs['type'];
        $etablissement->nbPeriodesAnnee = $inputs['nbPeriodesAnnee'];
        $etablissement->methodeCalculMoyennes = $inputs['methodeCalculMoyennes'];
        $etablissement->logo = $inputs['logo'];
        $etablissement->dateCreation = $inputs['dateCreation'];
        $etablissement->save();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return Etablissement::findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        // TODO: Implement update() method.
        $etablissement_up = Etablissement::find($id);
        return $this->store($etablissement_up, $inputs);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
         return Etablissement::destroy($id);
    }
}