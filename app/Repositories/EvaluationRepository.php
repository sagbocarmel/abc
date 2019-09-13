<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:50 AM
 */

namespace App\Repositories;


use App\Models\Evaluation;

class EvaluationRepository implements EvaluationRepositoryInterface
{
    protected $evaluation;

    /**
     * EvaluationRepository constructor.
     * @param $evaluation
     */
    public function __construct(Evaluation $evaluation)
    {
        $this->evaluation = $evaluation;
    }


    public function store(array $inputs)
    {
        $this->evaluation = new Evaluation();
        $this->evaluation->codeEtablissement = $inputs['codeEtablissement'];
        $this->evaluation->codeAnnee = $inputs['codeAnnee'];
        $this->evaluation->codeMatiere = $inputs['codeMatiere'];
        $this->evaluation->codeEvaluation = $inputs['codeEvaluation'];
        $this->evaluation->niveau = $inputs['niveau'];
        $this->evaluation->codeClasse = $inputs['codeClasse'];
        $this->evaluation->periode = $inputs['periode'];
        $this->evaluation->type = $inputs['type'];
        $this->evaluation->date = $inputs['date'];
        $this->evaluation->duree = $inputs['duree'];
        $this->evaluation->save();
        return $this->evaluation;
    }

    public function update($codeEtablissement, $codeAnnee, $niveau, $codeClasse, $codeMatiere, $codeEvaluation, $periode, array $inputs)
    {
        $this->evaluation = Evaluation::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('codeMatiere',$codeMatiere)->
        where('codeEvaluation',$codeEvaluation)->
        where('periode',$periode)->first();

        $this->evaluation->codeEtablissement = $inputs['codeEtablissement'];
        $this->evaluation->codeAnnee = $inputs['codeAnnee'];
        $this->evaluation->codeMatiere = $inputs['codeMatiere'];
        $this->evaluation->codeEvaluation = $inputs['codeEvaluation'];
        $this->evaluation->niveau = $inputs['niveau'];
        $this->evaluation->codeClasse = $inputs['codeClasse'];
        $this->evaluation->periode = $inputs['periode'];
        $this->evaluation->type = $inputs['type'];
        $this->evaluation->date = $inputs['date'];
        $this->evaluation->duree = $inputs['duree'];
        $this->evaluation->save();
        return $this->evaluation;
    }

    public function find($codeEtablissement, $codeAnnee, $niveau, $codeClasse, $codeMatiere, $codeEvaluation, $periode)
    {
        return Evaluation::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('codeMatiere',$codeMatiere)->
        where('codeEvaluation',$codeEvaluation)->
        where('periode',$periode)->firstOrFail();
    }

    public function delete($codeEtablissement, $codeAnnee, $niveau, $codeClasse, $codeMatiere, $codeEvaluation, $periode)
    {
        Evaluation::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('codeMatiere',$codeMatiere)->
        where('codeEvaluation',$codeEvaluation)->
        where('periode',$periode)->delete();
    }

    public function findAllEvaluationByMatiere($codeEtablissement, $codeAnnee, $niveau, $codeClasse, $codeMatiere, $periode)
    {
        return Evaluation::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('codeMatiere',$codeMatiere)->
        where('periode',$periode)->get();
    }

    public function findAllEvaluationByClasse($codeEtablissement, $codeAnnee, $niveau, $codeClasse, $periode)
    {
        return Evaluation::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('periode',$periode)->get();
    }

    public function findAllEvaluationByPeriode($codeEtablissement, $codeAnnee, $niveau, $periode)
    {
        return Evaluation::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->
        where('periode',$periode)->get();
    }

    public function findAllEvaluationByAnnee($codeEtablissement, $codeAnnee, $niveau)
    {
        return Evaluation::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('niveau',$niveau)->get();
    }
}