<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 9:15 PM
 */

namespace App\Repositories;


use App\Models\Appreciation;

class AppreciationRepository implements AppreciationRepositoryInterface
{
    protected $appreciation;

    /**
     * AppreciationRepository constructor.
     * @param $appreciation
     */
    public function __construct(Appreciation $appreciation)
    {
        $this->appreciation = $appreciation;
    }


    public function store(array $inputs)
    {
        $this->appreciation = new Appreciation();
        $this->appreciation->codeEtablissement = $inputs['codeEtablissement'];
        $this->appreciation->codeAnnee = $inputs['codeAnnee'];
        $this->appreciation->matriculeEleve = $inputs['matriculeEleve'];
        $this->appreciation->niveau = $inputs['niveau'];
        $this->appreciation->codeClasse = $inputs['codeClasse'];
        $this->appreciation->codeMatiere = $inputs['codeMatiere'];
        $this->appreciation->codeEvaluation = $inputs['codeEvaluation'];
        $this->appreciation->periode = $inputs['periode'];
        $this->appreciation->appreciation = $inputs['appreciation'];
        $this->appreciation->dateAppreciation = $inputs['dateAppreciation'];
        $this->appreciation->save();
        return  $this->appreciation;
    }

    public function update($codeEtablissement, $codeAnnee, $matriculeEleve, $niveau, $codeClasse, $codeMatiere, $codeEvaluation, $periode, array $inputs)
    {
        $this->appreciation = Appreciation::where('codeEtablissement', $codeEtablissement)->
        where('codeAnnee',$codeAnnee )->
        where('matriculeEleve', $matriculeEleve)->
        where('niveau', $niveau)->
        where('codeClasse',$codeClasse )->
        where('codeMatiere', $codeMatiere)->
        where('codeEvaluation', $codeEvaluation)->
        where('periode', $periode)->first();

        $this->appreciation->codeEtablissement = $inputs['codeEtablissement'];
        $this->appreciation->codeAnnee = $inputs['codeAnnee'];
        $this->appreciation->matriculeEleve = $inputs['matriculeEleve'];
        $this->appreciation->niveau = $inputs['niveau'];
        $this->appreciation->codeClasse = $inputs['codeClasse'];
        $this->appreciation->codeMatiere = $inputs['codeMatiere'];
        $this->appreciation->codeEvaluation = $inputs['codeEvaluation'];
        $this->appreciation->periode = $inputs['periode'];
        $this->appreciation->appreciation = $inputs['appreciation'];
        $this->appreciation->dateAppreciation = $inputs['dateAppreciation'];
        $this->appreciation->save();
        return  $this->appreciation;
    }

    public function find($codeEtablissement, $codeAnnee, $matriculeEleve, $niveau, $codeClasse, $codeMatiere, $codeEvaluation, $periode)
    {
        return Appreciation::where('codeEtablissement', $codeEtablissement)->
        where('codeAnnee',$codeAnnee )->
        where('matriculeEleve', $matriculeEleve)->
        where('niveau', $niveau)->
        where('codeClasse',$codeClasse )->
        where('codeMatiere', $codeMatiere)->
        where('codeEvaluation', $codeEvaluation)->
        where('periode', $periode)->firstOrFail();
    }

    public function delete($codeEtablissement, $codeAnnee, $matriculeEleve, $niveau, $codeClasse, $codeMatiere, $codeEvaluation, $periode)
    {
        Appreciation::where('codeEtablissement', $codeEtablissement)->
        where('codeAnnee', $codeAnnee)->
        where('matriculeEleve', $matriculeEleve)->
        where('niveau', $niveau)->
        where('codeClasse',$codeClasse )->
        where('codeMatiere', $codeMatiere)->
        where('codeEvaluation', $codeEvaluation)->
        where('periode', $periode)->delete();
    }
}