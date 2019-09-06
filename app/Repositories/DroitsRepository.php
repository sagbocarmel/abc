<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/5/19
 * Time: 10:13 AM
 */

namespace App\Repositories;


use App\Models\Droit;

class DroitsRepository implements DroitsRepositoryInterface
{
    protected $droits;

    /**
     * DroitsRepository constructor.
     * @param Droit $droit
     */
    public function __construct(Droit $droit)
    {
        $this->droits = $droit;
    }


    public function store(array $inputs)
    {
        $this->droits->codeRole = $inputs['codeRole'];
        $this->droits->codeElement = $inputs['codeElement'];
        $this->droits->droit = $inputs['droit'];
        $this->droits->save();
        return $this->droits;
    }

    public function update($codeRole, $codeElement, $droit, array $inputs)
    {
        $this->droits = Droit::where('codeRole',$codeRole)->
        where('codeElement',$codeElement)->where('droit',$droit)->firstOrFail();
        $this->droits->codeRole = $inputs['codeRole'];
        $this->droits->codeElement = $inputs['codeElement'];
        $this->droits->droit = $inputs['droit'];
        $this->droits->save();
        return $this->droits;
    }

    public function find($codeRole, $codeElement, $droit)
    {
        return $this->droits = Droit::where('codeRole',$codeRole)->
        where('codeElement',$codeElement)->where('droit',$droit)->firstOrFail();
    }

    public function findAll($codeRole, $codeElement)
    {
        return $this->droits = Droit::where('codeRole',$codeRole)->
        where('codeElement',$codeElement)->get();
    }

    public function delete($codeRole, $codeElement, $droit)
    {
        Droit::where('codeRole',$codeRole)->
        where('codeElement',$codeElement)->where('droit',$droit)->delete();
    }

    public function deleteAll($codeRole, $codeElement)
    {
        Droit::where('codeRole',$codeRole)->
        where('codeElement',$codeElement)->delete();
    }
}