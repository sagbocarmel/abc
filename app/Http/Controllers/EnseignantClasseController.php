<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnseignantClasseRequest;
use App\Repositories\EnseignantClasseRepository;
use Illuminate\Http\Request;

class EnseignantClasseController extends Controller
{
    protected $enseignantClasseRepostory;

    /**
     * EnseignantClasseController constructor.
     * @param EnseignantClasseRepository $enseignantClasseRepostory
     */
    public function __construct(EnseignantClasseRepository $enseignantClasseRepostory)
    {
        $this->enseignantClasseRepostory = $enseignantClasseRepostory;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $enseignantClasses= $this->enseignantClasseRepostory->findAll();
        return response()->json(['data'=>[
            ['success' => true ,
                'enseignantClasses'=> $enseignantClasses
            ]]], 200);
    }

    /**
     * @param EnseignantClasseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EnseignantClasseRequest $request)
    {
        $enseignantClasse = $this->enseignantClasseRepostory->store($request->all());
        return response()->json(['data'=>[
            ['success' => true ,
                'enseignantClasse'=> $enseignantClasse,
                'message' => 'Ajout avec succès']]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $matriculeEnseignant
     * @param $codeClasse
     * @param $niveau
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($codeEtablissement,$matriculeEnseignant,$codeClasse, $niveau)
    {
        $enseignantClasse= $this->enseignantClasseRepostory->find($codeEtablissement,$matriculeEnseignant,$codeClasse, $niveau);
        return response()->json(['data'=>[
            ['success' => true ,
                'enseignantClasse'=> $enseignantClasse
            ]]], 200);
    }

    /**
     * @param EnseignantClasseRequest $request
     * @param $codeEtablissementr
     * @param $matriculeEnseignantr
     * @param $codeClasser
     * @param $niveaur
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EnseignantClasseRequest $request, $codeEtablissementr,$matriculeEnseignantr,$codeClasser, $niveaur)
    {
        $enseignantClasse = $this->enseignantClasseRepostory->update($codeEtablissementr,$matriculeEnseignantr,$codeClasser, $niveaur,$request->all());
        return response()->json(['data'=>[
            ['success' => true ,
                'enseignantClasse'=> $enseignantClasse,
                'message' => 'Mis à jour avec succès']]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $matriculeEnseignant
     * @param $codeClasse
     * @param $niveau
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($codeEtablissement ,$matriculeEnseignant,$codeClasse, $niveau)
    {
        $this->enseignantClasseRepostory->delete($codeEtablissement ,$matriculeEnseignant,$codeClasse, $niveau);
        return response()->json(['data'=>[
            ['success' => true ,
                'message' => 'Operation end successfully']]], 200);
    }

    /**
     * @param $codeEtablissement
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllEnseignantByEtablissement($codeEtablissement){
        $enseignants= $this->enseignantClasseRepostory->findAllEnseignantByEtablissement($codeEtablissement);
        return response()->json(['data'=>[
            ['success' => true ,
                'codeEtablissement' => $codeEtablissement,
                'enseignants'=> $enseignants
            ]]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeClasse
     * @param $niveau
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllEnseignantByClasse($codeEtablissement,$codeClasse,$niveau){
        $enseignants= $this->enseignantClasseRepostory->findAllEnseignantByClasse($codeEtablissement,$codeClasse,$niveau);
        return response()->json(['data'=>[
            ['success' => true ,
                'codeEtablissement' => $codeEtablissement,
                'codeClasse' => $codeClasse,
                'niveau' => $niveau,
                'enseignants'=> $enseignants
            ]]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $niveau
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllEnseignantByNiveau($codeEtablissement, $niveau){
        $enseignants= $this->enseignantClasseRepostory->findAllEnseignantByNiveau($codeEtablissement,$niveau);
        return response()->json(['data'=>[
            ['success' => true ,
                'codeEtablissement' => $codeEtablissement,
                'niveau' => $niveau,
                'enseignants'=> $enseignants
            ]]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $matriculeEnseignant
     * @param $niveau
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllClasseByEnseignant($codeEtablissement,$matriculeEnseignant,$niveau){
        $classes= $this->enseignantClasseRepostory->findAllClasseByEnseignant($codeEtablissement,$matriculeEnseignant,$niveau);
        return response()->json(['data'=>[
            ['success' => true ,
                'codeEtablissement' => $codeEtablissement,
                'matriculeEnseignant' => $matriculeEnseignant,
                'niveau' => $niveau,
                'classes'=> $classes
            ]]], 200);
    }
}
