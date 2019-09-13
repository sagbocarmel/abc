<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnneeScolaireEtablissementRequest;
use App\Models\AnneeScolaireEtablissement;
use App\Repositories\AnneeScolaireEtablissementRepository;
use Illuminate\Http\Request;

class AnneeScolaireEtablissementController extends Controller
{
    protected $anneScolaireEtablissementRepository;

    /**
     * AnneeScolaireEtablissementController constructor.
     * @param AnneeScolaireEtablissementRepository $anneScolaireEtablissementRepository
     */
    public function __construct(AnneeScolaireEtablissementRepository $anneScolaireEtablissementRepository)
    {
        $this->anneScolaireEtablissementRepository = $anneScolaireEtablissementRepository;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $annee= $this->anneScolaireEtablissementRepository->findAll(request()->codeEtablissement);

        $response = [
            'success' => true,
            'anneScolaire' => $annee,
        ];
        return response()->json(['data' => $response], 200);
    }


    /**
     * @param AnneeScolaireEtablissementRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AnneeScolaireEtablissementRequest $request)
    {
        $data = [
            'codeAnnee' => $request->anneeScolaire,
            'codeEtablissement' => $request->codeEtablissement,
            'dateFermeture' => $request->dateFermeture,
            'statut' => $request->statut
        ];
        $annee = new AnneeScolaireEtablissement();
        $annee = $this->anneScolaireEtablissementRepository->store($annee ,$data);

        $response = [
            'success' => true,
            'anneScolaire' => $annee,
        ];
        return response()->json(['data' => $response], 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $annee = $this->anneScolaireEtablissementRepository->find(request()->codeEtablissement, $id);

        $response = [
            'success' => true,
            'anneScolaire' => $annee,
        ];
        return response()->json(['data' => $response], 200);
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AnneeScolaireEtablissementRequest $request,$id)
    {
        $data = [
            'codeAnnee' => $request->anneeScolaire,
            'codeEtablissement' => $request->codeEtablissement,
            'dateFermeture' => $request->dateFermeture,
            'statut' => $request->statut
        ];

        $annee = $this->anneScolaireEtablissementRepository->update($request->codeEtablissement ,$id ,$data);

        $response = [
            'success' => true,
            'anneScolaire' => $annee,
        ];
        return response()->json(['data' => $response], 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->anneScolaireEtablissementRepository->delete(\request()->codeEtablissement,$id);

        $response = [
            'success' => true,
            'message' => 'Deleted successfully',
        ];
        return response()->json(['data' => $response], 200);
    }
}
