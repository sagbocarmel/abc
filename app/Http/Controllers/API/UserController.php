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
        description="",
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

    public function registerNewUser(Array $data)
    {
        $input = $data;
        $user = User::create($input);

        $success['token'] = $user->createToken('ABC')->accessToken;
        $success['name'] = $user->email;
        $success['id'] = $user->id;

        return $success;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
        @OA\Post(
            path="/abc/user/{id}",
            tags={"Utilisateur aved le numeros tel"},
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
        $user = $this->userRepository->find($tel);

        $response = [
            'success' => true,
             $user,
            'message' => 'User with phone '.$tel.' retrieved successfully.'
        ];
        return response()->json(['users'=>$response], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
