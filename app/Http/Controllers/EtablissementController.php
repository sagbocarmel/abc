<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtablissementsRequest;
use App\Http\Resources\Etablissement as Etablissemen;
use App\Models\Utilisateur;
use App\Repositories\ClasseRepository;
use App\Repositories\EtablissementRepository;
use App\Models\Etablissement;
use App\Repositories\Media\LogoRepository;
use Carbon\Carbon;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EtablissementController extends Controller
{
     protected $etablissementRepository;
     protected $logoRepository;
     protected $classeRepository;
     protected $etablissement;
     protected $user;

    /**
     * EtablissementController constructor.
     * @param $etablissementRepository
     */
    public function __construct(EtablissementRepository $etablissementRepository,
                                LogoRepository $logoRepository,ClasseRepository $classeRepository,
                                Etablissement $etablissement, Utilisateur $user)
    {
        $this->etablissementRepository = $etablissementRepository;
        $this->logoRepository = $logoRepository;
        $this->classeRepository = $classeRepository;
        $this->etablissement = $etablissement;
        $this->user = $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(EtablissementsRequest $request){
        // Get the file from the request
        $file = $request->file('logo');
        $contents = base64_encode(file_get_contents($file->getRealPath()));

        $data = [
            'numeroAutorisation' => $request->numeroAutorisation,
            'nom' => $request->nom,
            'description' => $request->description,
            'type' => $request->type,
            'statut' => $request->statut,
            'adresse' => $request->statut,
            'bp' => $request->bp,
            'tel' => $request->tel,
            'email' => $request->email,
            'dateCreation' => $request->dateCreation,
            'logo' => $contents
        ];

        $etablissement = $this->etablissementRepository->save($data);

        $response = [
            'success' => true,
            'etablissement' => $etablissement,
        ];
        return response()->json(['data' => $response], 200, array(
            'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($etablissement->logo)));
    }


    /**
        @OA\Get(
            path="/abc/etablissement/{id}",
            tags={"Find Etablissement "},
            summary="Find in Etablissement resource using numeroAutorisation as id",
            operationId="show",
            @OA\Parameter(
            name="codeEtablissement",
            in="query",
            required=true,
            @OA\Schema(
            type="string"
            )
            ),
            @OA\Parameter(
            name="id",
            in="query",
            required=true,
            @OA\Schema(
            type="string"
            )
            ),
            @OA\Response(
            response=200,
            description="Success",
            @OA\MediaType(
            mediaType="application/json",
            )
            ),
            @OA\Response(
            response=401,
            description="Unauthorized"
            ),
            @OA\Response(
            response=400,
            description="Invalid request"
            ),
            @OA\Response(
            response=404,
            description="not found"
            ),
        )
     **/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $result = $this->etablissementRepository->find($id);
        return response()->json([
            'data' => $result
           // 'logo' => response()->download(config('logo_etablissement.path').'/'.$result->logo,$result->nom)
        ],200);
    }


    /**
     * @OA\Put(
     *     path="/abc/etablissement/{id}",
     *     tags={"Update Existing Etablissement"},
     *     summary="Update existing etablissement Ressource Établissement",
     *     operationId="register",
     *     @OA\Parameter(
     *       name="codeEtablissement",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="string"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="numeroAutorisation",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="string"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="nom",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="string"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="logo",
     *      in="query",
     *      required=false,
     *       @OA\Schema(
     *       type="image"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="description",
     *      in="query",
     *      required=false,
     *       @OA\Schema(
     *       type="string"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="type",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="string"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="statut",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="string"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="adresse",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="string"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="bp",
     *      in="query",
     *      required=false,
     *       @OA\Schema(
     *       type="string"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="tel",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="integer"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="email",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="string"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="dateCreation",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="date"
     *       )
     *       ),
     *     @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *     ),
     *     @OA\Response(
     *      response=400,
     *      description="Erreur",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *     ),
     *     @OA\RequestBody(
     *         description="Mis à jour d'un ;etablissement",
     *         required=true
     *     )
     * )
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EtablissementsRequest $request, $id)
    {
        // Get the file from the request
        $file = $request->file('logo');

        $contents = base64_encode(file_get_contents($file->getRealPath()));

        $data = [
            'numeroAutorisation' => $request->numeroAutorisation,
            'nom' => $request->nom,
            'description' => $request->description,
            'type' => $request->type,
            'statut' => $request->statut,
            'adresse' => $request->statut,
            'bp' => $request->bp,
            'tel' => $request->tel,
            'email' => $request->email,
            'dateCreation' => $request->dateCreation,
            'logo' => $contents
        ];

        $etablissement = new Etablissemen($this->etablissementRepository->update($id,$data));
        $response = [
            'success' => true,
            'etablissement' => $etablissement,
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
        $this->etablissementRepository->delete($id);
        return response()->json([
            'message' => "L'établissement de numéros d'autorisation ".$id." supprimé avec succès",
            'success' => true
        ],200);
    }

    public function allClasses($id){
        return response()->json([
            'data' => $this->classeRepository->findAllByEtablissement($id)
        ],200);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function viewAny(){

        $this->user = Auth::user();

        $this->etablissement = Etablissement::where('numeroAutorisation',request()->codeEtablissement)->get();

        $data = $this->etablissementRepository->findAll();
        return response(['data'=>$data], 200);

    }
}
