<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnneeScolaireRequest;
use App\Models\AnneeScolaire;
use App\Repositories\AnneeScolaireRepository;
use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{
    protected $anneeScolaireRepository;

    /**
     * AnneeScolaireController constructor.
     * @param AnneeScolaireRepository $anneeScolaireRepository
     */
    public function __construct(AnneeScolaireRepository $anneeScolaireRepository)
    {
        $this->anneeScolaireRepository = $anneeScolaireRepository;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $annee= $this->anneeScolaireRepository->findAll();

        $response = [
            'success' => true,
            'anneScolaire' => $annee,
        ];
        return response()->json(['data' => $response], 200);
    }

    /**
     * @param AnneeScolaireRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AnneeScolaireRequest $request)
    {
        $data = [
            'codeAnnee' => $request->anneeScolaire,
        ];

        $annee= $this->anneeScolaireRepository->store($data['codeAnnee']);

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
        $annee= $this->anneeScolaireRepository->find($id);

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
    public function update(Request $request, $id)
    {
        $data = [
            'codeAnnee' => $request->anneeScolaire,
        ];
        $annee= $this->anneeScolaireRepository->update($id,$data['codeAnnee']);

        $response = [
            'success' => true,
            'anneScolaire' => $annee
        ];
        return response()->json(['data' => $response], 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->anneeScolaireRepository->delete($id);

        $response = [
            'success' => true,
            'message' => 'Delete operation end successfully'
        ];
        return response()->json(['data' => $response], 200);
    }
}
