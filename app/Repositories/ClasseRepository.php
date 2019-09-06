<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:17 AM
 */

namespace App\Repositories;

use \App\Models\Classe;
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
        $this->classe = new Classe();
        $this->classe->codeEtablissement = $inputs['codeEtablissement'];
        $this->classe->codeClasse = $inputs['codeClasse'];
        $this->classe->niveau = $inputs['niveau'];
        $this->classe->anneEtude = $inputs['anneEtude'];
        $this->classe->serie = $inputs['serie'];
        $this->classe->codeSection = $inputs['codeSection'];
        $this->classe->save();
        return $this->classe;
    }

    public function update($codeEtablissement, $niveau, $codeClasse, array $inputs)
    {
        $this->classe = Classe::where('codeEtablissement',$codeEtablissement)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->firstOrFail();
        $this->classe->codeEtablissement = $inputs['codeEtablissement'];
        $this->classe->codeClasse = $inputs['codeClasse'];
        $this->classe->niveau = $inputs['niveau'];
        $this->classe->anneEtude = $inputs['anneEtude'];
        $this->classe->serie = $inputs['serie'];
        $this->classe->codeSection = $inputs['codeSection'];
        $this->classe->save();
        return $this->classe;
    }

    public function findAllByEtablissement($codeEtablissement)
    {
        return Classe::where('codeEtablissement',$codeEtablissement)->
        get();
    }

    public function find($codeEtablissement, $niveau, $codeClasse)
    {
        return Classe::where('codeEtablissement',$codeEtablissement)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->firstOrFail();
    }

    public function delete($codeEtablissement, $niveau, $codeClasse)
    {
        Classe::where('codeEtablissement',$codeEtablissement)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->delete();
    }

    public function findBySection($codeEtablissement, $codeSection)
    {
        return Classe::where('codeEtablissement',$codeEtablissement)->
        where('codeSection',$codeSection)->get();
    }

    public function findByNiveau($codeEtablissement, $niveau)
    {
        return Classe::where('codeEtablissement',$codeEtablissement)->
        where('niveau',$niveau)->get();
    }
}