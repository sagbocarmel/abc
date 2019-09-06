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
     * @param $anneScolaireEtablissementRepository
     */
    public function __construct(AnneeScolaireEtablissementRepository $anneScolaireEtablissementRepository)
    {
        $this->anneScolaireEtablissementRepository = $anneScolaireEtablissementRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
