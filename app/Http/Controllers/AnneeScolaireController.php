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
     */
    public function __construct(AnneeScolaireRepository $anneeScolaireRepository)
    {
        $this->anneeScolaireRepository = $anneeScolaireRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
