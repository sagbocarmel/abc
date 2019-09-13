<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParentElevesRequest;
use App\Repositories\ParentEleveRepository;
use Illuminate\Http\Request;

class ParentElevesController extends Controller
{
    protected $parentsEleveRepository;

    /**
     * ParentElevesController constructor.
     * @param ParentEleveRepository $parentsEleveRepository
     */
    public function __construct(ParentEleveRepository $parentsEleveRepository)
    {
        $this->parentsEleveRepository = $parentsEleveRepository;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $relationPE = $this->parentsEleveRepository->findAll();
        return response()->json(['data'=> [
            'success' => true,
            'parentEleves' => $relationPE
        ]],200);
    }

    /**
     * @param ParentElevesRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ParentElevesRequest $request)
    {
        $parentEleve = $this->parentsEleveRepository->store($request->all());
        return response()->json(['data'=>[
            ['success' => true ,
                'parentEleve'=> $parentEleve,
                'message' => 'Ajout avec succès']]], 200);
    }

    /**
     * @param $telParent
     * @param $matriculeEleve
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($telParent,$matriculeEleve)
    {
        $relationPE = $this->parentsEleveRepository->find($telParent,$matriculeEleve);
        return response()->json(['data'=> [
            'success' => true,
            'parentEleve' => $relationPE
        ]],200);
    }


    /**
     * @param ParentElevesRequest $request
     * @param $telParentr
     * @param $matriculeElever
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ParentElevesRequest $request, $telParentr,$matriculeElever)
    {
        $parentEleve = $this->parentsEleveRepository->update($telParentr,$matriculeElever,$request->all());
        return response()->json(['data'=>[
            ['success' => true ,
                'parentEleve'=> $parentEleve,
                'message' => ' mis à jour avec succès']]], 200);
    }

    /**
     * @param $telParent
     * @param $matriculeEleve
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($telParent,$matriculeEleve)
    {
        $this->parentsEleveRepository->delete($telParent,$matriculeEleve);
        return response()->json(['success' => true ,
            'message' => 'Relation parent eleve supprimée avec succès'], 200);
    }

    /**
     * @param $telParent
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllEleveByParent($telParent){
        $eleves = $this->parentsEleveRepository->findAllParentEleve($telParent);
        return response()->json(['data'=> [
            'success' => true,
            'telephoneParent' => $telParent,
            'eleves' => $eleves
        ]],200);
    }

    /**
     * @param $matriculeEleve
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllParentByEleve($matriculeEleve){
        $parents = $this->parentsEleveRepository->findAllEleveParent($matriculeEleve);
        return response()->json(['data'=> [
            'success' => true,
            'matriculeEleve' => $matriculeEleve,
            'eleves' => $parents
        ]],200);
    }
}
