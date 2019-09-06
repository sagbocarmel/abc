<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 9/5/19
 * Time: 10:14 AM
 */

namespace App\Repositories;


use App\Models\Cour;

class CoursRepository implements CoursRepositoryInterface
{
    protected $cours;

    /**
     * CoursRepository constructor.
     * @param $cours
     */
    public function __construct(Cour $cours)
    {
        $this->cours = $cours;
    }

    public function store(array $inputs)
    {
        $this->cours = new Cour();
        $this->cours->codeEtablissement = $inputs['codeEtablissement'];
        $this->cours->codeAnnee = $inputs['codeAnnee'];
        $this->cours->codeClasse = $inputs['codeClasse'];
        $this->cours->codeMatiere = $inputs['codeMatiere'];
        $this->cours->jourCours = $inputs['jourCours'];
        $this->cours->heureDebut = $inputs['heureDebut'];
        $this->cours->heureFin = $inputs['heureFin'];
        $this->cours->save();
        return $this->cours;
    }

    public function update($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere, $jourCours, array $inputs)
    {
        $this->cours = Cour::where('codeEtablissement',$codeEtablissement)->
        where('niveau', $niveau)->
        where('codeClasse', $codeClasse)->
        where('codeAnnee',$codeAnnee)->
        where('codeMatiere',$codeMatiere)->
        where('jourCours',$jourCours)->firstOrFail();

        $this->cours->codeEtablissement = $inputs['codeEtablissement'];
        $this->cours->codeAnnee = $inputs['codeAnnee'];
        $this->cours->codeClasse = $inputs['codeClasse'];
        $this->cours->codeMatiere = $inputs['codeMatiere'];
        $this->cours->jourCours = $inputs['jourCours'];
        $this->cours->heureDebut = $inputs['heureDebut'];
        $this->cours->heureFin = $inputs['heureFin'];
        $this->cours->save();
        return $this->cours;
    }

    public function find($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere, $jourCours)
    {
        return Cour::where('codeEtablissement',$codeEtablissement)->
        where('niveau', $niveau)->
        where('codeClasse', $codeClasse)->
        where('codeAnnee',$codeAnnee)->
        where('codeMatiere',$codeMatiere)->
        where('jourCours',$jourCours)->firstOrFail();
    }

    public function delete($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere, $jourCours)
    {
        Cour::where('codeEtablissement',$codeEtablissement)->
        where('niveau', $niveau)->
        where('codeClasse', $codeClasse)->
        where('codeAnnee',$codeAnnee)->
        where('codeMatiere',$codeMatiere)->
        where('jourCours',$jourCours)->delete();
    }

    public function findAll($codeEtablissement, $codeAnnee)
    {
        return Cour::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->get();
    }

    public function findAllByNiveau($codeEtablissement, $niveau, $codeAnnee)
    {
        return Cour::where('codeEtablissement',$codeEtablissement)->
        where('niveau', $niveau)->
        where('codeAnnee',$codeAnnee)->get();
    }

    public function findAllByClasse($codeEtablissement, $niveau, $codeClasse, $codeAnnee)
    {
        return Cour::where('codeEtablissement',$codeEtablissement)->
        where('niveau', $niveau)->
        where('codeClasse', $codeClasse)->
        where('codeAnnee',$codeAnnee)->get();
    }

    public function findAllByMatiere($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere)
    {
        return Cour::where('codeEtablissement',$codeEtablissement)->
        where('niveau', $niveau)->
        where('codeClasse', $codeClasse)->
        where('codeAnnee',$codeAnnee)->
        where('codeMatiere',$codeMatiere)->get();
    }
}