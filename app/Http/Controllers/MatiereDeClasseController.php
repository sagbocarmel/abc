<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatiereDeClasseRequest;
use App\Repositories\MatieresDeClassesRepository;
use Illuminate\Http\Request;

class MatiereDeClasseController extends Controller
{
    protected $matiereDeClasseRepository;

    /**
     * MatiereDeClasseController constructor.
     * @param MatieresDeClassesRepository $matiereDeClasseRepository
     */
    public function __construct(MatieresDeClassesRepository $matiereDeClasseRepository)
    {
        $this->matiereDeClasseRepository = $matiereDeClasseRepository;
    }


    /**
     * @param MatiereDeClasseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MatiereDeClasseRequest $request)
    {
        $matiereDeClasse= $this->matiereDeClasseRepository->store($request->all());
        return response()->json(['data'=>[
            ['success' => true ,
                'matiereDeClasse'=> $matiereDeClasse
            ]]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $niveau
     * @param $codeClasse
     * @param $codeMatiere
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($codeEtablissement, $codeAnnee, $niveau, $codeClasse, $codeMatiere)
    {
        $matiereDeClasse= $this->matiereDeClasseRepository->find($codeEtablissement, $codeAnnee, $niveau, $codeClasse, $codeMatiere);
        return response()->json(['data'=>[
            ['success' => true ,
                'matiereDeClasse'=> $matiereDeClasse
            ]]], 200);
    }

    /**
     * @param MatiereDeClasseRequest $request
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $niveau
     * @param $codeClasse
     * @param $codeMatiere
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MatiereDeClasseRequest $request, $codeEtablissement, $codeAnnee, $niveau, $codeClasse, $codeMatiere)
    {
        $matiereDeClasse = $this->matiereDeClasseRepository->update($codeEtablissement, $codeAnnee, $niveau, $codeClasse, $codeMatiere, $request->all());
        return response()->json(['data'=>[
            ['success' => true ,
                'matiereDeClasse'=> $matiereDeClasse,
                'message' => 'Mis à jour avec succès'
            ]]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $niveau
     * @param $codeClasse
     * @param $codeMatiere
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($codeEtablissement, $codeAnnee, $niveau, $codeClasse, $codeMatiere)
    {
        $this->matiereDeClasseRepository->delete($codeEtablissement, $codeAnnee, $niveau, $codeClasse, $codeMatiere);
        return response()->json(['data'=>[
            ['success' => true ,
                'message' => 'Operation end successfully'
            ]]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $niveau
     * @param $codeClasse
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllMatiereByClasse($codeEtablissement,$codeAnnee,$niveau,$codeClasse){
        $matieres= $this->matiereDeClasseRepository->findAllMatiereByClasse($codeEtablissement, $codeAnnee, $niveau, $codeClasse);
        return response()->json(['data'=>[
            ['success' => true ,
                'codeEtablissement' => $codeEtablissement,
                'codeAnnee' => $codeAnnee,
                'niveau' => $niveau,
                'codeClasse' => $codeClasse,
                'matieres'=> $matieres
            ]]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $niveau
     * @param $matriculeEnseignant
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllMatiereByEnseignant($codeEtablissement,$codeAnnee,$niveau,$matriculeEnseignant){
        $matieres= $this->matiereDeClasseRepository->findAllMatiereByEnseignant($codeEtablissement, $codeAnnee, $niveau, $matriculeEnseignant);
        return response()->json(['data'=>[
            ['success' => true ,
                'codeEtablissement' => $codeEtablissement,
                'codeAnnee' => $codeAnnee,
                'niveau' => $niveau,
                'matriculeEnseignant' => $matriculeEnseignant,
                'matieres'=> $matieres
            ]]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $niveau
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllMatiereByNiveau($codeEtablissement,$codeAnnee,$niveau){
        $matieres= $this->matiereDeClasseRepository->findAllMatiereByNiveau($codeEtablissement, $codeAnnee, $niveau);
        return response()->json(['data'=>[
            ['success' => true ,
                'codeEtablissement' => $codeEtablissement,
                'codeAnnee' => $codeAnnee,
                'niveau' => $niveau,
                'matieres'=> $matieres
            ]]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $niveau
     * @param $codeClasse
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllMatiereByClasseAndAnnee($codeEtablissement,$codeAnnee,$niveau,$codeClasse){
        $matieres= $this->matiereDeClasseRepository->findAllMatiereByClasseAndAnnee($codeEtablissement, $codeAnnee, $niveau, $codeClasse);
        return response()->json(['data'=>[
            ['success' => true ,
                'codeEtablissement' => $codeEtablissement,
                'codeAnnee' => $codeAnnee,
                'niveau' => $niveau,
                'codeClasse' => $codeClasse,
                'matieres'=> $matieres
            ]]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $niveau
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllMatiereByNiveauAndAnnee($codeEtablissement,$codeAnnee,$niveau){
        $matieres= $this->matiereDeClasseRepository->findAllMatiereByNiveauAndAnnee($codeEtablissement, $codeAnnee, $niveau);
        return response()->json(['data'=>[
            ['success' => true ,
                'codeEtablissement' => $codeEtablissement,
                'codeAnnee' => $codeAnnee,
                'niveau' => $niveau,
                'matieres'=> $matieres
            ]]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $niveau
     * @param $codeClasse
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEnseignantAndMatiereByClasse($codeEtablissement,$codeAnnee,$niveau,$codeClasse){
        $matiereEnseignants= $this->matiereDeClasseRepository->findEnseignantAndMatiereByClasse($codeEtablissement, $codeAnnee, $niveau, $codeClasse);
        return response()->json(['data'=>[
            ['success' => true ,
                'codeEtablissement' => $codeEtablissement,
                'codeAnnee' => $codeAnnee,
                'niveau' => $niveau,
                'codeClasse' => $codeClasse,
                'matieresEnseignants'=> $matiereEnseignants
            ]]], 200);
    }

}
