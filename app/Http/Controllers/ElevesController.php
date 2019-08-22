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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ElevesRequest $request)
    {
        //
        $dataWithImage = $request->all();
        $userData = [
            'nom'=>$dataWithImage['nom'],
            'prenoms'=>$dataWithImage['prenoms'],
            'sexe'=>$dataWithImage['sexe'],
            'email'=>$dataWithImage['email'],
            'tel1'=>$dataWithImage['tel1'],
            'tel2'=>$dataWithImage['tel2'],
            'password'=> "Abc1245+",
            'idProfile'=>$dataWithImage['idProfile'],
        ];

        $mytime = Carbon::now();
        $imageName =  preg_replace('/[^a-z\d ]/i', '_', $mytime->toDateTimeString().'_'.$request->matricule.$request->nom.$request->prenoms);
        $imageName = str_replace(' ','',$imageName);

        $user = $this->userController->registerNewUser($userData);
        $photo =  $this->imageRepository->storefile($dataWithImage['image'],$imageName);
        $eleve = [
            'nom'=>$dataWithImage['nom'],
            'prenoms'=>$dataWithImage['prenoms'],
            'sexe'=>$dataWithImage['sexe'],
            'email'=>$dataWithImage['email'],
            'tel1'=>$dataWithImage['tel1'],
            'tel2'=>$dataWithImage['tel2'],
            'dateNaissance' => $dataWithImage['dateNaissance'],
            'adresse' => $dataWithImage['adresse'],
            'nationalite' => $dataWithImage['nationalite'],
            'photo' => $photo['name'],
            'infoSup' => $dataWithImage['infoSup'],
            'matricule' => $dataWithImage['matricule'],
            'idClasse' => $dataWithImage['idClasse'],
            'idUtilisateur' => $user['id'],
            'id'=>$dataWithImage['id']
        ];

        $eleveSaved = $this->eleveRepository->store($eleve);

        if($photo['name'] != '')
        {
            $files = Response::download(config('image_abc_s_m.path').'/'.$eleveSaved->photo,$eleveSaved->photo);
            $response = [
                'success' => true,
                'eleve_data' => $eleveSaved,
                'image_eleve' => $files
            ];
        }else{
            $response = [
                'success' => true,
                'eleve_data' => $eleveSaved,
                'image_eleve' => []
            ];
        }

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
        return response()->json(['data'=> new Eleve($this->eleveRepository->findById($id))],200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ElevesRequest $request, $id, $matricule)
    {
        $dataWithImage = $request->all();
        $userData = [
            'nom'=>$dataWithImage['nom'],
            'prenoms'=>$dataWithImage['prenoms'],
            'sexe'=>$dataWithImage['sexe'],
            'email'=>$dataWithImage['email'],
            'tel1'=>$dataWithImage['tel1'],
            'tel2'=>$dataWithImage['tel2'],
            'password'=> "Abc1245+",
            'idProfile'=>$dataWithImage['idProfile'],
        ];

        $mytime = Carbon::now();
        $imageName =  preg_replace('/[^a-z\d ]/i', '_', $mytime->toDateTimeString().'_'.$request->matricule.$request->nom.$request->prenoms);
        $imageName = str_replace(' ','',$imageName);
        $eleveUp = \App\Eleve::where('id',$id)->get();
        $user = $this->userRepository->update($eleveUp->idUtilisateur,$userData);


        $photo =  $this->imageRepository->storefile($dataWithImage['image'],$imageName);
        $eleve = [
            'nom'=>$dataWithImage['nom'],
            'prenoms'=>$dataWithImage['prenoms'],
            'sexe'=>$dataWithImage['sexe'],
            'email'=>$dataWithImage['email'],
            'tel1'=>$dataWithImage['tel1'],
            'tel2'=>$dataWithImage['tel2'],
            'dateNaissance' => $dataWithImage['dateNaissance'],
            'adresse' => $dataWithImage['adresse'],
            'nationalite' => $dataWithImage['nationalite'],
            'photo' => $photo['name'],
            'infoSup' => $dataWithImage['infoSup'],
            'matricule' => $dataWithImage['matricule'],
            'idClasse' => $dataWithImage['idClasse'],
            'idUtilisateur' => $user['id']
        ];

        $this->eleveRepository->updateByMatricule($matricule,$id,$eleve);

        return response()->json(['success' => true ,
            'ed'=>$eleveUp,
            'message' => 'Elève mis à jour avec succès'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->eleveRepository->deleteById($id);
        return response()->json(['success' => true ,
            'message' => 'Elève supprimée avec succès'], 200);
    }

    public function destroyByMatricule($matricule)
    {
        $this->eleveRepository->deleteByMatricule($matricule);
        return response()->json(['success' => true ,
            'message' => 'Elève supprimée avec succès'], 200);
    }


    public function getElevesByClasse($id_classe){
        return response()->json(['data'=> $this->eleveRepository->findAllByIdClasse($id_classe)],200);
    }

    public function showByMatricule($matricule){
        return response()->json(['data'=> new Eleve($this->eleveRepository->findByMatricule($matricule))],200);
    }

    public function updateByMatricule(ElevesRequest$request, $matricule){
        $dataWithImage = $request->all();
        $userData = [
            'nom'=>$dataWithImage['nom'],
            'prenoms'=>$dataWithImage['prenoms'],
            'sexe'=>$dataWithImage['sexe'],
            'email'=>$dataWithImage['email'],
            'tel1'=>$dataWithImage['tel1'],
            'tel2'=>$dataWithImage['tel2'],
            'password'=> "Abc1245+",
            'idProfile'=>$dataWithImage['idProfile'],
        ];

        $mytime = Carbon::now();
        $imageName =  preg_replace('/[^a-z\d ]/i', '_', $mytime->toDateTimeString().'_'.$request->matricule.$request->nom.$request->prenoms);
        $imageName = str_replace(' ','',$imageName);

        $user = $this->userController->update(new UserRequest($userData),$matricule);
        $photo =  $this->imageRepository->storefile($dataWithImage['image'],$imageName);
        $eleve = [
            'nom'=>$dataWithImage['nom'],
            'prenoms'=>$dataWithImage['prenoms'],
            'sexe'=>$dataWithImage['sexe'],
            'email'=>$dataWithImage['email'],
            'tel1'=>$dataWithImage['tel1'],
            'tel2'=>$dataWithImage['tel2'],
            'dateNaissance' => $dataWithImage['dateNaissance'],
            'adresse' => $dataWithImage['adresse'],
            'nationalite' => $dataWithImage['nationalite'],
            'photo' => $photo['name'],
            'infoSup' => $dataWithImage['infoSup'],
            'matricule' => $dataWithImage['matricule'],
            'idClasse' => $dataWithImage['idClasse'],
            'idUtilisateur' => $user['id'],
            'id'=>$dataWithImage['id']
        ];

        $this->eleveRepository->updateByMatricule($eleve['matricule'],$eleve);

        return response()->json(['success' => true ,
            'message' => 'Elève mis à jour avec succès'], 200);
    }

    public function image($paths,$fileName){
        $path = $paths.$fileName;
        return Response::download($path);
    }
}
