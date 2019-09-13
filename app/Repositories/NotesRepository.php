<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:26 AM
 */

namespace App\Repositories;


use App\Models\Note;

class NotesRepository implements NotesRepositoryInterface
{

    protected $note;

    /**
     * NotesRepository constructor.
     * @param $note
     */
    public function __construct(Note $note)
    {
        $this->note = $note;
    }


    public function store(array $inputs)
    {
        $this->note = new Note();
        $this->note->codeEtablissement = $inputs['codeEtablissement'];
        $this->note->codeAnnee = $inputs['codeAnnee'];
        $this->note->codeMatiere = $inputs['codeMatiere'];
        $this->note->codeEvaluation = $inputs['codeEvaluation'];
        $this->note->niveau = $inputs['niveau'];
        $this->note->codeClasse = $inputs['codeClasse'];
        $this->note->periode = $inputs['periode'];
        $this->note->matriculeEleve = $inputs['matriculeEleve'];
        $this->note->note = $inputs['note'];
        $this->note->dateNote = $inputs['dateNote'];
        $this->note->save();
        return $this->note;
    }

    public function update($codeEtablissement, $codeAnnee, $codeMatiere, $codeEvaluation, $niveau, $codeClasse, $periode, $matriculeEleve, array $inputs)
    {
        $this->note = Note::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('codeMatiere',$codeMatiere)->
        where('codeEvaluation',$codeEvaluation)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('periode',$periode)->
        where('matriculeEleve',$matriculeEleve)->first();

        $this->note->codeEtablissement = $inputs['codeEtablissement'];
        $this->note->codeAnnee = $inputs['codeAnnee'];
        $this->note->codeMatiere = $inputs['codeMatiere'];
        $this->note->codeEvaluation = $inputs['codeEvaluation'];
        $this->note->niveau = $inputs['niveau'];
        $this->note->codeClasse = $inputs['codeClasse'];
        $this->note->periode = $inputs['periode'];
        $this->note->matriculeEleve = $inputs['matriculeEleve'];
        $this->note->note = $inputs['note'];
        $this->note->dateNote = $inputs['dateNote'];
        $this->note->save();
        return $this->note;
    }

    public function find($codeEtablissement, $codeAnnee, $codeMatiere, $codeEvaluation, $niveau, $codeClasse, $periode, $matriculeEleve)
    {
        return Note::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('codeMatiere',$codeMatiere)->
        where('codeEvaluation',$codeEvaluation)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('periode',$periode)->
        where('matriculeEleve',$matriculeEleve)->firstOrFail();
    }

    public function delete($codeEtablissement, $codeAnnee, $codeMatiere, $codeEvaluation, $niveau, $codeClasse, $periode, $matriculeEleve)
    {
        Note::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('codeMatiere',$codeMatiere)->
        where('codeEvaluation',$codeEvaluation)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('periode',$periode)->
        where('matriculeEleve',$matriculeEleve)->delete();
    }

    public function findAllByMatriculeEleve($codeEtablissement, $codeAnnee, $codeMatiere, $niveau, $codeClasse, $periode, $matriculeEleve)
    {
        return Note::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('codeMatiere',$codeMatiere)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('periode',$periode)->
        where('matriculeEleve',$matriculeEleve)->get();
    }

    public function findAllByEvaluation($codeEtablissement, $codeAnnee, $codeMatiere, $codeEvaluation, $niveau, $codeClasse, $periode)
    {
        return Note::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('codeMatiere',$codeMatiere)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('codeEvaluation',$codeEvaluation)->
        where('periode',$periode)->get();
    }

    public function findAllByMatriculeEleveAndMatiere($codeEtablissement, $codeAnnee, $codeMatiere, $niveau, $codeClasse, $periode, $matriculeEleve)
    {
        return Note::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('codeMatiere',$codeMatiere)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('periode',$periode)->
        where('matriculeEleve',$matriculeEleve)->get();
    }

    public function findAllByClasseAndMatiere($codeEtablissement, $codeAnnee, $codeMatiere, $niveau, $codeClasse, $periode)
    {
        return Note::where('codeEtablissement',$codeEtablissement)->
        where('codeAnnee',$codeAnnee)->
        where('codeMatiere',$codeMatiere)->
        where('niveau',$niveau)->
        where('codeClasse',$codeClasse)->
        where('periode',$periode)->get();
    }
}