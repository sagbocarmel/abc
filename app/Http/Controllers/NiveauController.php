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
     * @param $niveauRepository
     */
    public function __construct(NiveauRepository $niveauRepository)
    {
        $this->niveauRepository = $niveauRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
