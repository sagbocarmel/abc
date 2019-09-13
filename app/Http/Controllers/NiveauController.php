<?php

namespace App\Http\Controllers;

use App\Http\Requests\NiveauRequest;
use App\Models\Niveau;
use App\Repositories\NiveauRepository;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    protected $niveauRepository;

    /**
     * NiveauController constructor.
     * @param NiveauRepository $niveauRepository
     */
    public function __construct(NiveauRepository $niveauRepository)
    {
        $this->niveauRepository = $niveauRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $niveau =$this->niveauRepository->findAll(\request()->codeEtablissement);

        return response()->json(['data'=> [
            'niveau' => $niveau,
            'success' =>  true
        ]],200);
    }


    /**
     * @param NiveauRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(NiveauRequest $request)
    {
        $data = [
            'codeEtablissement' => $request->codeEtablissement,
            'niveau' => $request->niveau,
            'periodesAnnee' => $request->periodesAnnee,
            'methodeCalculMoyennes' => $request->methodeCalculMoyennes,
            'heureDebutCours' => $request->heureDebutCours,
            'heureFinCours' => $request->heureFinCours
        ];

        $niveau =$this->niveauRepository->store(new Niveau(),$data);

        return response()->json(['data'=> [
            'niveau' => $niveau,
            'success' =>  true
        ]],200);
    }

    /**
     * @param $codeEtablissement
     * @param $niveau
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($codeEtablissement, $niveau)
    {
        $niveau =$this->niveauRepository->find($codeEtablissement, $niveau);

        return response()->json(['data'=> [
            'niveau' => $niveau,
            'success' =>  true
        ]],200);
    }


    /**
     * @param NiveauRequest $request
     * @param $niveau
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(NiveauRequest $request, $niveau)
    {
        $data = [
            'codeEtablissement' => $request->codeEtablissement,
            'niveau' => $request->niveau,
            'periodesAnnee' => $request->periodesAnnee,
            'methodeCalculMoyennes' => $request->methodeCalculMoyennes,
            'heureDebutCours' => $request->heureDebutCours,
            'heureFinCours' => $request->heureFinCours
        ];

        $niveau = $this->niveauRepository->update(request()->codeEtablissement, $niveau, $data);

        return response()->json(['data'=> [
            'niveau' => $niveau,
            'success' =>  true
        ]],200);
    }

    /**
     * @param $niveau
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($niveau)
    {
        $this->niveauRepository->delete(request()->codeEtablissement, $niveau);

        return response()->json(['data'=> [
            'message' => 'Operation end',
            'success' =>  true
        ]],200);
    }
}
