<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 9:24 PM
 */

namespace App\Repositories;


use App\Models\Bulletin;

class BulletinRepository implements BulletinRepositoryInterface
{
    protected $bulletin;

    /**
     * BulletinRepository constructor.
     * @param $bulletin
     */
    public function __construct(Bulletin $bulletin)
    {
        $this->bulletin = $bulletin;
    }


    public function store($inputs)
    {
        $this->bulletin = new Bulletin();
        $this->bulletin->codeAnnee = $inputs['codeAnnee'];
        $this->bulletin->codeEtablissement = $inputs['codeEtablissement'];
        $this->bulletin->periode = $inputs['periode'];
        $this->bulletin->matriculeEleve = $inputs['matriculeEleve'];
        $this->bulletin->bulletin = $inputs['bulletin'];
        $this->bulletin->save();
        return $this->bulletin;
    }

    public function update($codeEtablissement, $codeAnnee, $matriculeEleve, $periode, $input)
    {
        $this->bulletin = Bulletin::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('matriculeEleve',$matriculeEleve)->
        where('periode',$periode)->
        first();
        $this->bulletin->codeAnnee = $input['codeAnnee'];
        $this->bulletin->codeEtablissement = $input['codeEtablissement'];
        $this->bulletin->periode = $input['periode'];
        $this->bulletin->matriculeEleve = $input['matriculeEleve'];
        $this->bulletin->bulletin = $input['bulletin'];
        $this->bulletin->save();
        return $this->bulletin;
    }

    public function find($codeEtablissement, $codeAnnee, $matriculeEleve, $periode)
    {
        return Bulletin::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('matriculeEleve',$matriculeEleve)->
        where('periode',$periode)->
        firstOrFail();
    }

    public function findAll($codeEtablissement, $codeAnnee, $periode)
    {
        return Bulletin::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('periode',$periode)->
        get();
    }

    public function delete($codeEtablissement, $codeAnnee, $matriculeEleve, $periode)
    {
        Bulletin::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('matriculeEleve',$matriculeEleve)->
        where('periode',$periode)->
        delete();
    }
}