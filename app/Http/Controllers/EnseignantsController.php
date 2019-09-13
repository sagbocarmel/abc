<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnseignantRequest;
use App\Repositories\EnseignantRepository;
use Illuminate\Http\Request;

class EnseignantsController extends Controller
{
    protected $enseignantsRepository;

    /**
     * EnseignantsController constructor.
     * @param EnseignantRepository $enseignantsRepository
     */
    public function __construct(EnseignantRepository $enseignantsRepository)
    {
        $this->enseignantsRepository = $enseignantsRepository;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $enseignants = $this->enseignantsRepository->findAll();

        $response = [
            'success' => true,
            'enseigants' => $enseignants
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $enseignantSaved = $this->enseignantsRepository->store($request->all());

        $response = [
            'success' => true,
            'enseigant_data' => $enseignantSaved
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param $matricule
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($matricule)
    {
        $enseignant = $this->enseignantsRepository->find($matricule);

        $response = [
            'success' => true,
            'enseigant_data' => $enseignant
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param EnseignantRequest $request
     * @param $matriculeEnseignant
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EnseignantRequest $request, $matriculeEnseignant)
    {
        $enseignantSaved = $this->enseignantsRepository->update($matriculeEnseignant,$request->all());

        $response = [
            'success' => true,
            'enseigant_data' => $enseignantSaved
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param $matriculeEnseignant
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($matriculeEnseignant)
    {
        $this->enseignantsRepository->delete($matriculeEnseignant);

        $response = [
            'success' => true,
            'message' => 'Operation end successfully'
        ];

        return response()->json(['data' => $response], 200);
    }
}
