<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvaluationRequest;
use App\Http\Resources\Evaluation;
use App\Http\Resources\Evaluations;
use App\Repositories\EvaluationRepository;
use Illuminate\Http\Request;

class EvaluationsController extends Controller
{
    protected $evaluationRepository;

    /**
     * EvaluationsController constructor.
     * @param $evaluationRepository
     */
    public function __construct(EvaluationRepository $evaluationRepository)
    {
        $this->evaluationRepository = $evaluationRepository;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(EvaluationRequest $request)
    {
        //
        $data = [
            'titre' => $request->titre,
            'type' => $request->type,
            'date' => $request->date,
            'duree' => $request->duree,
            'periode' => $request->periode,
            'idClasse' => $request->idClasse,
            'idMatiere' => $request->idMatiere
        ];
        $classe = $this->evaluationRepository->store($data);

        return response()->json(['data'=> new Evaluation($classe)],200);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->json(['data'=> new Evaluation($this->evaluationRepository->find($id))],200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EvaluationRequest $request, $id)
    {
        //
        $this->evaluationRepository->update($id,$request->all());
        return response()->json(['success' => true ,
            'message' => 'Evaluation mis à jour avec succès'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->evaluationRepository->delete($id);
        return response()->json(['success' => true ,
            'message' => 'Evaluation supprimée avec succès'], 200);
    }

    public function getEvaluationsByClasse($id){
        return response()->json(['data'=> new Evaluations($this->evaluationRepository->findAllByClasse($id))],200);
    }

    public function getEvaluationsByMatiere($id){
        return response()->json(['data'=> new Evaluations($this->evaluationRepository->findAllByMatiere($id))],200);
    }
}
