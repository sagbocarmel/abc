<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/5/19
 * Time: 10:16 AM
 */

namespace App\Repositories;


use App\Models\Niveau;

class NiveauRepository implements NiveauRepositoryInterface
{

    protected $niveau;

    /**
     * NiveauRepository constructor.
     * @param $niveau
     */
    public function __construct(Niveau $niveau)
    {
        $this->niveau = $niveau;
    }


    public function store(Niveau $niveau, array $inputs)
    {
        $niveau->codeEtablissement = $inputs['codeEtablissement'];
        $niveau->niveau = $inputs[''];
        $niveau->periodesAnnee = $inputs[''];
        $niveau->heureDebutCours = $inputs[''];
        $niveau->heureFinCours = $inputs[''];
        $niveau->save();
        return $niveau;
    }

    public function update($codeEtablissement, $niveau, array $inputs)
    {
        $this->niveau = Niveau::where('codeEtablissement', $codeEtablissement)->where('niveau',$niveau)->firstOrFail();
        $this->niveau = $this->store($this->niveau, $inputs);
        return $this->niveau;
    }

    public function find($codeEtablissement, $niveau)
    {
        return Niveau::where('codeEtablissement', $codeEtablissement)->where('niveau',$niveau)->firstOrFail();
    }

    public function findAll($codeEtablissement)
    {
        return Niveau::where('codeEtablissement', $codeEtablissement)->get();
    }

    public function delete($codeEtablissement, $niveau)
    {
        Niveau::where('codeEtablissement', $codeEtablissement)->where('niveau',$niveau)->delete();
    }
}