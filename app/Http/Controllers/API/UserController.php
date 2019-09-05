<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\OtherUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\UtilisateurEtablissement;
use App\Repositories\UserRepository;
use App\Models\Utilisateur as User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use \App\Http\Resources\Users as UserRessourceCollection;
use \App\Http\Resources\User as UserRessource;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */

/**
    @OA\Info(
        description="Ressource ABC API",
        version="1.0.0",
        title="ABC School Managment  App API",
     ),
  @OA\SecurityScheme(
        securityScheme="OAUTH 2.0",
          type="http"
      ),
 **/
class UserController extends Controller
{
    protected $userRepository;
    /**
     * UserController constructor.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register api
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $userInput = [];
        $userInput['nom'] = $input['nom'];
        $userInput['prenoms'] = $input['prenoms'];
        $userInput['sexe'] = $input['sexe'];
        $userInput['email'] = $input['email'];
        $userInput['tel'] = $input['tel'];
        $userInput['tel2'] = $input['tel2'];
        $userInput['password'] = $input['password'];
        $userInput['photo'] = $input['photo'];

        $user = User::create($userInput);
        $userEtablissement = new UtilisateurEtablissement();
        $userEtablissement->tel = $user->tel;
        $userEtablissement->codeEtablissement = $input['codeEtablissement'];
        $userEtablissement->save();

        $success['token'] = $user->createToken('ABC')->accessToken;
        $success['mail'] = $user->email;
        $success['telephone'] = $user->tel;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'Utilisater  crée avec succès.'
        ];

        return response()->json($response, 200);
    }

    /**
     * @OA\Post(
     *     path="/abc/new/user",
     *     tags={"Register new User"},
     *     summary="Register new user with User Resource",
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
     *       name="codeEtablissementUtilisateur",
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
     *       name="prenoms",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="string"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="sexe",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="string"
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
     *       name="tel",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="integer"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="tel2",
     *      in="query",
     *      required=false,
     *       @OA\Schema(
     *       type="integer"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="password",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="string"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="photo",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="image"
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
     *         description="Enregistrement d'un nouvel utilisateur",
     *         required=true
     *     )
     * )
     */
    /**
     * abc/new/user
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerNewUser(OtherUserRequest $request)
    {
        if($this->userRepository->find($request->tel,$request->codeEtablissementUtilisateur) == null &&
            $this->userRepository->find($request->tel, $request->codeEtablissement) == null){
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $userInput = [];
            $userInput['nom'] = $input['nom'];
            $userInput['prenoms'] = $input['prenoms'];
            $userInput['sexe'] = $input['sexe'];
            $userInput['email'] = $input['email'];
            $userInput['tel'] = $input['tel'];
            $userInput['tel2'] = $input['tel2'];
            $userInput['password'] = $input['password'];
            $userInput['photo'] = $input['photo'];

            $user = User::create($userInput);
            $userEtablissement = new UtilisateurEtablissement();
            $userEtablissement->tel = $user->tel;
            $userEtablissement->codeEtablissement = $input['codeEtablissementUtilisateur'];
            $userEtablissement->save();

            $success['token'] = $user->createToken('ABC')->accessToken;
            $success['mail'] = $user->email;
            $success['telephone'] = $user->tel;
            $success['codeEtablissementUtilisateur'] = $userEtablissement->codeEtablissement;
            return response()->json(['data'=>$success,
                'message' => 'New user created'],200);
        }
        return response()->json([
            'errorMessage' => ' Utilisateur existant'],400);
    }

    /**
        @OA\Post(
            path="/abc/login",
            tags={"Login user in"},
            summary="Login user phone number and password to receive generated token",
            operationId="login",

            @OA\Parameter(
                name="tel",
                in="query",
                required=true,
                @OA\Schema(
                    type="string"
                )
            ),
            @OA\Parameter(
                name="codeEtablissement",
                in="query",
                required=true,
                @OA\Schema(
                    type="string"
                )
            ),
            @OA\Parameter(
                name="password",
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
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = [
            'tel' => $request->tel,
            'password' => $request->password
        ];
        if (Auth::attempt([
            'tel' => $request->tel,
            'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('ABC')->accessToken;

            return response()->json(['success' => $success], 200);
        } else {
            return response()->json(['error' => 'Unauthorised',
                "data" => [request('tel'),request('password')]], 401);
        }
    }

    /**
     * abc/users
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(){

        $users = new UserRessourceCollection(User::all());

        $response = [
            'success' => true,
            $users,
            'message' => 'Users retrieved successfully.'
        ];

        if ($users == null)
        {
            $response = [
                'success' => true,
                $users,
                'message' => 'No users.'
            ];
            return response()->json(['users'=>$response], 200);
        }
        return response()->json(['users'=>$response], 200);
    }

    /**
        @OA\Get(
            path="/abc/user/{tel}",
            tags={"Find user using phone number"},
            summary="Find in user resource a user with tel as id",
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
                name="tel",
                in="query",
                required=true,
                @OA\Schema(
                type="string"
                )
            ),
            @OA\Parameter(
            name="password",
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
     * @param  int  $tel
     * @return \Illuminate\Http\Response
     */
    public function show($tel)
    {
        $user = $this->userRepository->find($tel, request()->codeEtablissement);

        if($user ==  null)
        {
            $response = [
                'success' => true,
                'message' => 'Aucun utilisateur trouvé'
            ];
            return response()->json(['users'=>$response], 200);
        }
        $response = [
            'success' => true,
            $user,
            'message' => 'User with phone '.$tel.' retrieved successfully.'
        ];
        return response()->json(['data'=>$response], 200);
    }

    /**
     * @OA\Put(
     *     path="/abc/user/{tel}",
     *     tags={"update in resource Utilisateur"},
     *     summary="Update user using his phone number",
     *     operationId="update",
     *     @OA\Parameter(
     *       name="codeEtablissement",
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
     *       name="prenoms",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="string"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="sexe",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="string"
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
     *       name="tel",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="integer"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="tel2",
     *      in="query",
     *      required=false,
     *       @OA\Schema(
     *       type="integer"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="password",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="string"
     *       )
     *       ),
     *     @OA\Parameter(
     *       name="photo",
     *      in="query",
     *      required=true,
     *       @OA\Schema(
     *       type="image"
     *       )
     *       ),
     *     @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *     ),
     *     @OA\RequestBody(
     *         description="Mis à jour d'un utilisateur",
     *         required=true
     *     )
     * )
     */

    /**
     * Update the specified resource in storage. abc/user/{tel}
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tel)
    {
        $inputs = $request->all();
        $inputs['password'] = bcrypt($inputs['password']);
        $user = $this->userRepository->update($tel, $request->codeEtablissement, $inputs);

        if($user == null)
        {
            $response = [
                'success' => true,
                'message' => 'No User'
            ];
            return response()->json(['users'=>$response], 200);
        }
        $response = [
            'success' => true,
            $user,
            'message' => 'User with phone '.$tel.' updated successfully.'
        ];

        return response()->json(['users'=>$response], 200);
    }

    /**
     * @OA\Delete(
     *     path="/abc/user/{tel}",
     *     tags={"delUtilisateur"},
     *     summary="Supprimer un utilisateur avec son numéros de téléphone",
     *     description="Supprimer un utilisateur avec son numéros de téléphone",
     *     operationId="destroy",
     *     @OA\Parameter(
     *         name="tel",
     *         in="path",
     *         required=true,
     *         description="tel de l'utilisateur à supprimer de l'établissement actuel ",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             minimum=8,
     *             maximum=8
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="codeEtablissement",
     *         in="path",
     *         required=true,
     *         description="Code de l'établissement de l'utilisateur connecté de l'établissement actuel ",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Telephone invalide"
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Non autorisé"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Utilisateur non existant"
     *     )
     * ),
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tel)
    {

        if($tel == Auth::user()->tel)
        {
            return response()->json([
                'error' => 'Impossible de supprimer cet utilisateur'], 403);
        }
        $response = $this->userRepository->delete($tel,request()->codeEtablissement);
        if($response == false){
            return response()->json(['success' => $response ,
                'message' => 'Operation end successfully'], 200);
        }
        return response()->json(['success' => $response ,
            'message' => 'Operation end successfully'], 200);
    }
}
