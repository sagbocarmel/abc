<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/5/19
 * Time: 8:04 AM
 */

namespace App\Repositories;


use App\Models\AnneeScolaire;

class AnneeScolaireRepository implements AnneeScolaireRepositoryInterface
{
    protected $anneScolaire;

    /**
     * AnneeScolaireRepository constructor.
     * @param $anneScolaire
     */
    public function __construct(AnneeScolaire $anneScolaire)
    {
        $this->anneScolaire = $anneScolaire;
    }


    public function store($inputs)
    {
        $this->anneScolaire = new AnneeScolaire();
        $this->anneScolaire->codeAnnee =  $inputs;
        $this->anneScolaire->save();
        return $this->anneScolaire;
    }

    public function update($codeAnne, $input)
    {
        $this->anneScolaire = $this->anneScolaire->where('codeAnnee',$codeAnne)->firstOrFail();
        $this->anneScolaire->codeAnnee =  $input;
        $this->anneScolaire->save();
        return $this->anneScolaire;
    }

    public function find($id)
    {
        return AnneeScolaire::find($id);
    }

    public function findAll()
    {
        return AnneeScolaire::all();
    }

    public function delete($id)
    {
        AnneeScolaire::destroy($id);
    }
}