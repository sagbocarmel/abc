<?php

namespace App\Http\Controllers;

use App\Http\Requests\InscriptionRequest;
use App\Repositories\ElevesRepository;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    protected $eleveRepository;

    /**
     * InscriptionController constructor.
     * @param ElevesRepository $eleveRepository
     */
    public function __construct(ElevesRepository $eleveRepository)
    {
        $this->eleveRepository = $eleveRepository;
    }


    /**
     * @param $codeEtablissement
     * @param $niveau
     * @param $codeClasse
     * @param $codeAnnee
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($codeEtablissement, $niveau, $codeClasse, $codeAnnee)
    {
        $inscrit = $this->eleveRepository->findAllInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee);

        $response = [
            'success' => true,
            'eleveInscrits' => $inscrit
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $niveau
     * @param $codeAnnee
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexByNiveau($codeEtablissement, $niveau, $codeAnnee)
    {
        $inscrit = $this->eleveRepository->findAllInscriptionByNiveau($codeEtablissement, $niveau, $codeAnnee);

        $response = [
            'success' => true,
            'eleveInscrits' => $inscrit
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexByAnnee($codeEtablissement, $codeAnnee)
    {
        $inscrit = $this->eleveRepository->findAllInscriptionByAnnee($codeEtablissement, $codeAnnee);

        $response = [
            'success' => true,
            'eleveInscrits' => $inscrit
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param InscriptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(InscriptionRequest $request)
    {
        $inscrit = $this->eleveRepository->storeInscription($request->all());

        $response = [
            'success' => true,
            'eleveInscrit' => $inscrit
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $niveau
     * @param $codeClasse
     * @param $codeAnnee
     * @param $matriculeEleve
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $matriculeEleve)
    {
        $inscrit = $this->eleveRepository->findInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $matriculeEleve);

        $response = [
            'success' => true,
            'eleveInscrit' => $inscrit
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param InscriptionRequest $request
     * @param $codeEtablissement
     * @param $niveau
     * @param $codeClasse
     * @param $codeAnnee
     * @param $matriculeEleve
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(InscriptionRequest  $request, $codeEtablissement, $niveau, $codeClasse, $codeAnnee, $matriculeEleve)
    {
        $inscrit = $this->eleveRepository->updateInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $matriculeEleve,  $request->all());

        $response = [
            'success' => true,
            'eleveInscrit' => $inscrit
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $niveau
     * @param $codeClasse
     * @param $codeAnnee
     * @param $matriculeEleve
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $matriculeEleve)
    {
        $this->eleveRepository->deleteInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $matriculeEleve);

        $response = [
            'success' => true,
            'message' => 'Deleted'
        ];

        return response()->json(['data' => $response], 200);
    }
}
