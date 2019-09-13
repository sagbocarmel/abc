<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/10/19
 * Time: 8:48 AM
 */

namespace App\Repositories;


use App\Models\Eleve;
use App\Models\ParentEleve;
use App\Models\Parents;
use Illuminate\Database\Eloquent\Collection;

class ParentEleveRepository implements  ParentEleveRepositoryInterface
{

    protected $parents;
    protected $eleve;
    protected $parentsEleve;

    /**
     * ParentEleveRepository constructor.
     * @param $parents
     * @param $eleve
     * @param $parentsEleve
     */
    public function __construct(Parents $parents, Eleve$eleve,ParentEleve $parentsEleve)
    {
        $this->parents = $parents;
        $this->eleve = $eleve;
        $this->parentsEleve = $parentsEleve;
    }


    public function store(array $inputs)
    {
        $this->parentsEleve = new ParentEleve();
        $this->parentsEleve->telParent = $inputs['telParent'];
        $this->parentsEleve->matriculeEleve = $inputs['matriculeEleve'];
        $this->parentsEleve->titre = $inputs['titre'];
        $this->parentsEleve->save();
        return $this->parentsEleve;

    }

    public function update($telParent, $matriculeEleve, array $inputs)
    {
        $this->parentsEleve = ParentEleve::where('telParent',$telParent)->
        where('matriculeEleve',$matriculeEleve)->first();
        $this->parentsEleve->telParent = $inputs['telParent'];
        $this->parentsEleve->matriculeEleve = $inputs['matriculeEleve'];
        $this->parentsEleve->titre = $inputs['titre'];
        $this->parentsEleve->save();
        return $this->parentsEleve;
    }

    public function findAllParentEleve($telParent)
    {
        $eleveParents = ParentEleve::where('telParent',$telParent)->get();
        $eleves = new Collection();
        foreach ($eleveParents as $eleveParent)
        {
            $eleves->push(Parents::where('matriculeEleve',$eleveParent->matriculeEleve));
        }
        return $eleves;
    }

    public function findAllEleveParent($matriculeEleve)
    {
        $parentsEleves = ParentEleve::where('matriculeEleve',$matriculeEleve)->get();
        $parents = new Collection();
        foreach ($parentsEleves as $parentsEleve)
        {
            $parents->push(Parents::where('tel',$parentsEleve->telParent));
        }
        return $parents;
    }

    public function delete($telParent, $matriculeEleve)
    {
        $this->parentsEleve = ParentEleve::where('telParent',$telParent)->
        where('matriculeEleve',$matriculeEleve)->delete();
    }

    public function findAll()
    {
        return $this->parentsEleve = ParentEleve::all();
    }

    public function find($telParent, $matriculeEleve)
    {
        return $this->parentsEleve = ParentEleve::where('telParent',$telParent)->
        where('matriculeEleve',$matriculeEleve)->firstOrFail();
    }
}