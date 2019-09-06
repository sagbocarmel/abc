<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\UserController;
use App\Http\Requests\ElevesRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\Eleve;
use App\Http\Resources\Eleves;
use App\Profile;
use App\Repositories\ElevesRepository;
use App\Repositories\Media\ImageRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ElevesController extends Controller
{
    protected $roleRepository;
    protected $profilRepository;
    protected $eleveRepository;
    protected $userController;
    protected $imageRepository;
    protected $userRepository;

    /**
     * ElevesController constructor.
     * @param $roleRepository
     * @param $profilRepository
     * @param $eleveRepository
     */
    public function __construct(RoleRepository $roleRepository,
                                ProfileRepository $profilRepository,
                                ElevesRepository $eleveRepository,
                                UserController $userController,
                                ImageRepository $imageRepository,
                                UserRepository $userRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->profilRepository = $profilRepository;
        $this->eleveRepository = $eleveRepository;
        $this->userController = $userController;
        $this->imageRepository = $imageRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eleve = $this->eleveRepository->findAll();
        return response()->json(['data'=>
            ['success' => true ,
                'cours'=>$eleve]], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ElevesRequest $request)
    {
        $eleveSaved = $this->eleveRepository->store($request->all());

        $response = [
            'success' => true,
            'eleve_data' => $eleveSaved
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($matriculeEleve)
    {
        return response()->json(['data'=> [
            'eleve'=>$this->eleveRepository->find($matriculeEleve),
            'success' => true
        ]],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ElevesRequest $request, $matriculeEleve)
    {
        $eleveSaved = $this->eleveRepository->update($matriculeEleve, $request->all());

        $response = [
            'success' => true,
            'eleve' => $eleveSaved,
            'message' => 'Elève mis à jour avec succès'
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($matriculeEleve)
    {
        $this->eleveRepository->delete($matriculeEleve);
        return response()->json([
            'data' => ['success' => true ,
                'message' => 'Elève supprimée avec succès']
        ], 200);
    }

    public function getElevesByClasse($id_classe){
        return response()->json(['data'=> $this->eleveRepository->findAllByIdClasse($id_classe)],200);
    }

    public function showByMatricule($matricule){
        return response()->json(['data'=> new Eleve($this->eleveRepository->findByMatricule($matricule))],200);
    }

    public function updateByMatricule(ElevesRequest$request, $matricule){


        $this->eleveRepository->updateByMatricule($eleve['matricule'],$eleve);

        return response()->json(['success' => true ,
            'message' => 'Elève mis à jour avec succès'], 200);
    }

    public function image($paths,$fileName){
        $path = $paths.$fileName;
        return Response::download($path);
    }
}
