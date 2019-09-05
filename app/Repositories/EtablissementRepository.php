<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:51 AM
 */

namespace App\Repositories;


use App\Models\Etablissement;
use Carbon\Carbon;
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
        return $this->store($this->etablissement, $inputs);
    }

    public function store(Etablissement $etablissement, Array $inputs)
    {
        $etablissement->numeroAutorisation = $inputs['numeroAutorisation'];
        $etablissement->nom = $inputs['nom'];
        $etablissement->logo = $inputs['logo'];
        $etablissement->type = $inputs['type'];
        $etablissement->statut = $inputs['statut'];
        $etablissement->adresse = $inputs['adresse'];
        $etablissement->bp = $inputs['bp'];
        $etablissement->tel = $inputs['tel'];
        $etablissement->email = $inputs['email'];
        try {
            $etablissement->dateCreation = new Carbon($inputs['dateCreation']);}
            catch (\Exception $e) {
        }
        $etablissement->description = $inputs['description'];
        $etablissement->save();
        return $etablissement;
    }

    public function find($id)
    {
        return Etablissement::findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $etablissement_up = Etablissement::find($id);
        return $this->store($etablissement_up, $inputs);
    }

    public function delete($id)
    {
         return Etablissement::destroy($id);
    }

    public function findAll()
    {
        return Etablissement::all();
    }
}