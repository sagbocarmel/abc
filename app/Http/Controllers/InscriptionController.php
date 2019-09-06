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
     * @param $eleveRepository
     */
    public function __construct(ElevesRepository $eleveRepository)
    {
        $this->eleveRepository = $eleveRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function storeInscription(Array $inputs);
//    public function updateInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee,$matriculeEleve,Array $inputs);
//    public function findInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $matriculeEleve);
//    public function deleteInscription($codeEtablissement, $niveau, $codeClasse, $codeAnnee,$matriculeEleve);
//    public function findAllInscription($codeEtablissement, $niveau, $codeClasse, $codeAnne);
//
//    public function findAllInscriptionByNiveau($codeEtablissement, $niveau, $codeAnne);
//    public function findAllInscriptionByAnnee($codeEtablissement, $codeAnne);
    public function index()
    {

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
