<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursRequest;
use App\Repositories\CoursRepository;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    protected $coursRepository;

    /**
     * CoursController constructor.
     * @param $coursRepository
     */
    public function __construct(CoursRepository $coursRepository)
    {
        $this->coursRepository = $coursRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($codeEtablissement, $niveau, $codeClasse, $codeAnnee)
    {
        $cours = $this->coursRepository->findAllByClasse($codeEtablissement, $niveau, $codeClasse, $codeAnnee);
        return response()->json(['data'=>
            ['success' => true ,
                'cours'=>$cours]], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoursRequest $request)
    {
        $data = [
            'codeEtablissement' => $request->codeEtablissement,
            'niveau' => $request->niveau,
            'codeClasse' => $request->codeClasse,
            'serie' => $request->serie,
            'anneEtude' => $request->anneEtude,
            'codeSection' => $request->codeSection
        ];
        $cours = $this->coursRepository->store($data);

        return response()->json(['data'=> [
            'cours' => $cours,
            'success'=> true]],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere, $jourCours)
    {
        $cours = $this->coursRepository->find($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere, $jourCours);
        return response()->json(['data'=>
            ['success' => true ,
                'cours'=>$cours]], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoursRequest $request, $codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere, $jourCours)
    {
        $cours = $this->coursRepository->update($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere, $jourCours,$request->all());
        return response()->json(['data'=>
            ['success' => true ,
                'message' => 'Cours mis à jour avec succès',
                'cours'=>$cours]], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere, $jourCours)
    {
        $this->coursRepository->delete($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere, $jourCours);
        return response()->json(['data'=>
            ['success' => true ,
                'message' => 'Cours supprimé avec succès']], 200);
    }

    public function getAllByEtablissement($codeEtablissement, $codeAnnee)
    {
        $cours = $this->coursRepository->findAll($codeEtablissement, $codeAnnee);
        return response()->json(['data'=>
            ['success' => true ,
                'cours'=>$cours]], 200);
    }

    public function getAllByNiveau($codeEtablissement, $niveau, $codeAnnee)
    {
        $cours = $this->coursRepository->findAllByNiveau($codeEtablissement, $niveau, $codeAnnee);
        return response()->json(['data'=>
            ['success' => true ,
                'cours'=>$cours]], 200);
    }

    public function getAllByMatiere($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere)
    {
        $cours = $this->coursRepository->findAllByMatiere($codeEtablissement, $niveau, $codeClasse, $codeAnnee, $codeMatiere);
        return response()->json(['data'=>
            ['success' => true ,
                'cours'=>$cours]], 200);
    }
}
