<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UserRequest;
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
        description="Ressource Utilisateur",
        version="1.0.0",
        title="ABC School Managment  App API",
     )
 **/

/**
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
     * @OA\Post(
     *     path="/abc/register",
     *     tags={"register"},
     *     summary="Register new user",
     *     operationId="registerNewUser",
     *     @OA\Response(
     *      response=200,
     *      description="Success",
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
     * Register api
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

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
     *     tags={"register"},
     *     summary="Register new user",
     *     operationId="register",
     *     @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *     )
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
    public function registerNewUser(Array $data)
    {
        $inputs = $data;
        $inputs['password'] = bcrypt($inputs['password']);
        $user = User::create($inputs);

        $success['token'] = $user->createToken('ABC')->accessToken;
        $success['mail'] = $user->email;
        $success['telephone'] = $user->tel;

        return response()->json($success,200);
    }

    /**
        @OA\Post(
            path="/abc/login",
            tags={"Login"},
            summary="Login",
            operationId="login",

            @OA\Parameter(
                name="email",
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
            'password' => $request->password]) ||
            [
                'email' => $request->email,
                'password' => $request->password]) {
            $user = auth()->user();
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
        @OA\Post(
            path="/abc/user/{tel}",
            tags={"Utilisateur avec le numeros tel"},
            summary="findUtilisateur",
            operationId="show",

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tel)
    {
        //
        $user0 = Auth::user();
        $user = $this->userRepository->find($tel, $user0->codeEtablissement);

        $response = [
            'success' => true,
             $user,
            'message' => 'User with phone '.$tel.' retrieved successfully.'
        ];
        return response()->json(['users'=>$response], 200);
    }


    /**
     * Update the specified resource in storage. abc/user/{tel}
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tel)
    {
        $user0 = Auth::user();
        $inputs = $request->all();
        $inputs['password'] = bcrypt($inputs['password']);
        $user = $this->userRepository->update($tel, $user0->codeEtablissement, $inputs);

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
     *             minimum=8
     *             maximum=8
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Telephone invalide"
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
        $this->userRepository->delete($tel,Auth::user()->codeEtablissement);
        return response()->json(['success' => true ,
            'message' => 'Utilisateur supprimée avec succès'], 200);
    }
}
