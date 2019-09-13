<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatieresRequest;
use App\Http\Resources\Matiere;
use App\Http\Resources\Matieres;
use App\Repositories\MatieresRepository;
use Illuminate\Http\Request;

class MatieresController extends Controller
{
    protected $matiereRepository;

    /**
     * MatieresController constructor.
     * @param MatieresRepository $matiereRepository
     */
    public function __construct(MatieresRepository $matiereRepository)
    {
        $this->matiereRepository = $matiereRepository;
    }

    /**
     * @param MatieresRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(MatieresRequest $request)
    {
        //
        $data = [
            'codeMatiere' => $request->codeMatiere,
            'type' => $request->type
        ];
        $matiere = $this->matiereRepository->store($data);

        return response()->json(['data'=> ['matiere'=>new Matiere($matiere)]],200);
    }


    /**
     * @param $codeMatiere
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($codeMatiere)
    {
        return response()->json(['data'=> new Matiere($this->matiereRepository->find($codeMatiere))],200);
    }

    /**
     * @param MatieresRequest $request
     * @param $codeMatierer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MatieresRequest $request, $codeMatierer)
    {
        $classe = $this->matiereRepository->update($codeMatierer,$request->all());
        return response()->json(['data'=>[
        ['success' => true ,
            'matiere'=> $classe,
            'message' => 'Matière mis à jour avec succès']]], 200);
    }

    /**
     * @param $codeMatiere
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($codeMatiere)
    {
        //
        $this->matiereRepository->delete($codeMatiere);
        return response()->json(['success' => true ,
            'message' => 'Matière supprimée avec succès'], 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMatieres(){
        return response()->json(['data'=> new Matieres($this->matiereRepository->findAll())],200);
    }
}
