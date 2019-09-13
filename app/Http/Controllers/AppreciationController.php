<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppreciationRequest;
use App\Repositories\AppreciationRepository;
use Illuminate\Http\Request;

class AppreciationController extends Controller
{
    protected $appreciationRepository;

    /**
     * AppreciationController constructor.
     * @param AppreciationRepository $appreciationRepository
     */
    public function __construct(AppreciationRepository $appreciationRepository)
    {
        $this->appreciationRepository = $appreciationRepository;
    }


    /**
     * @param AppreciationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AppreciationRequest $request)
    {
        $appreciation= $this->appreciationRepository->store($request->all());
        return response()->json(['data'=>[
            ['success' => true ,
                'appeciation'=> $appreciation
            ]]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $matriculeEleve
     * @param $niveau
     * @param $codeClasse
     * @param $codeMatiere
     * @param $codeEvaluation
     * @param $periode
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($codeEtablissement, $codeAnnee, $matriculeEleve, $niveau, $codeClasse, $codeMatiere, $codeEvaluation, $periode)
    {
        $appreciation= $this->appreciationRepository->find($codeEtablissement, $codeAnnee, $matriculeEleve, $niveau, $codeClasse, $codeMatiere, $codeEvaluation, $periode);
        return response()->json(['data'=>[
            ['success' => true ,
                'appeciation'=> $appreciation
            ]]], 200);
    }

    /**
     * @param AppreciationRequest $request
     * @param $codeEtablissementr
     * @param $codeAnneer
     * @param $matriculeElever
     * @param $niveaur
     * @param $codeClasser
     * @param $codeMatierer
     * @param $codeEvaluationr
     * @param $perioder
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AppreciationRequest $request, $codeEtablissementr, $codeAnneer, $matriculeElever, $niveaur, $codeClasser, $codeMatierer, $codeEvaluationr, $perioder)
    {
        $appreciation= $this->appreciationRepository->update($codeEtablissementr, $codeAnneer, $matriculeElever, $niveaur, $codeClasser, $codeMatierer, $codeEvaluationr, $perioder, $request->all());
        return response()->json(['data'=>[
            ['success' => true ,
                'appeciation'=> $appreciation,
                'message' => 'Mis à jour effectué avec sucsès'
            ]]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $matriculeEleve
     * @param $niveau
     * @param $codeClasse
     * @param $codeMatiere
     * @param $codeEvaluation
     * @param $periode
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($codeEtablissement, $codeAnnee, $matriculeEleve, $niveau, $codeClasse, $codeMatiere, $codeEvaluation, $periode)
    {
        $this->appreciationRepository->delete($codeEtablissement, $codeAnnee, $matriculeEleve, $niveau, $codeClasse, $codeMatiere, $codeEvaluation, $periode);
        return response()->json(['data'=>[
            ['success' => true ,
                'message' => 'Operation end successfully'
            ]]], 200);
    }
}
