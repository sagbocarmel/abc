<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/5/19
 * Time: 8:09 AM
 */

namespace App\Repositories;


use App\Models\AnneeScolaireEtablissement;

class AnneeScolaireEtablissementRepository implements AnneeScolaireEtablissementRepositoryInterface
{

    protected $anneeScolaireEtablissement;

    /**
     * AnneeScolaireEtablissementRepository constructor.
     * @param $anneeScolaireEtablissement
     */
    public function __construct(AnneeScolaireEtablissement $anneeScolaireEtablissement)
    {
        $this->anneeScolaireEtablissement = $anneeScolaireEtablissement;
    }


    public function store(AnneeScolaireEtablissement $annetablissement, array $inputs)
    {
        $annetablissement->codeAnnee = $inputs['codeAnnee'];
        $annetablissement->codeEtablissement = $inputs['codeEtablissement'];
        $annetablissement->dateFermeture = $inputs['dateFermeture'];
        $annetablissement->statut = $inputs['statut'];
        $annetablissement->save();
        return $annetablissement;
    }

    public function update($codeEtablissement, $codeAnne, array $inputs)
    {
        $this->anneeScolaireEtablissement = AnneeScolaireEtablissement::where('codeEtablissement',$codeEtablissement)->
            where('codeAnnee',$codeAnne)->firstOrFail();
        $this->store($this->anneeScolaireEtablissement,$inputs);
        return $this->anneeScolaireEtablissement;
    }

    public function find($codeEtablissement, $codeAnne)
    {
        return AnneeScolaireEtablissement::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnne)->firstOrFail();
    }

    public function findAll($codeEtablissement)
    {
        return AnneeScolaireEtablissement::where('codeEtablissement',$codeEtablissement)->get();
    }

    public function delete($codeEtablissement, $codeAnne)
    {
        $this->anneeScolaireEtablissement =  AnneeScolaireEtablissement::where('codeEtablissement',$codeEtablissement)->
    where('codeAnnee',$codeAnne)->firstOrFail();
        $this->anneeScolaireEtablissement->delete();
    }
}