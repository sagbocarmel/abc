<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassesRequest;
use App\Http\Resources\Classe;
use App\Http\Resources\Classes;
use App\Repositories\ClasseRepository;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    protected $classeRepository;

    /**
     * ClasseController constructor.
     * @param ClasseRepository $classeRepository
     */
    public function __construct(ClasseRepository $classeRepository)
    {
        $this->classeRepository = $classeRepository;
    }


    /**
     * @param ClassesRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(ClassesRequest $request)
    {
        //
        $data = [
            'codeEtablissement' => $request->codeEtablissement,
            'niveau' => $request->niveau,
            'codeClasse' => $request->codeClasse,
            'serie' => $request->serie,
            'anneEtude' => $request->anneEtude,
            'codeSection' => $request->codeSection
        ];
        $classe = $this->classeRepository->store($data);

        return response()->json(['data'=> new Classe($classe)],200);
    }

    /**
     * @param $codeEtablissement
     * @param $niveau
     * @param $codeClasse
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($codeEtablissement, $niveau, $codeClasse)
    {
        return response()->json(['data'=>['success'=> true,
            'classe'=> $this->classeRepository->find($codeEtablissement,$niveau,
                $codeClasse)]],200);
    }


    /**
     * @param ClassesRequest $request
     * @param $codeEtablissement
     * @param $niveau
     * @param $codeClasse
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ClassesRequest $request, $codeEtablissement, $niveau, $codeClasse)
    {
        $classe = $this->classeRepository->update($codeEtablissement, $niveau, $codeClasse,$request->all());
        return response()->json(['data'=>
            ['success' => true ,
                'message' => 'Classe mis à jour avec succès',
                'classe'=>$classe]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $niveau
     * @param $codeClasse
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($codeEtablissement, $niveau, $codeClasse)
    {
        //
        $this->classeRepository->delete($codeEtablissement, $niveau, $codeClasse);
        return response()->json(['success' => true ,
            'message' => 'Classe supprimée avec succès'], 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getClasses(){
        return response()->json(['data'=> new Classes($this->classeRepository->findAllByEtablissement(request()->codeEtablissement))],200);
    }

    /**
     * @param $codeEtablissement
     * @param $niveau
     * @return \Illuminate\Http\JsonResponse
     */
    public function getClassesByNiveau($codeEtablissement, $niveau){
        return response()->json(['data'=> new Classes($this->classeRepository->findByNiveau($codeEtablissement, $niveau))],200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeSection
     * @return \Illuminate\Http\JsonResponse
     */
    public function getClassesBySection($codeEtablissement, $codeSection){
        return response()->json(['data'=> new Classes($this->classeRepository->findBySection($codeEtablissement, $codeSection))],200);
    }

}
