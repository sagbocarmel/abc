<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\User;
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
     * Register api
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->email;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'Utilisater  crée avec succès.'
        ];

        return response()->json($response, 200);
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('ABC')->accessToken;

            return response()->json(['success' => $success], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = $this->userRepository->find($id);

        $response = [
            'success' => true,
             $user,
            'message' => 'User with id'.$id.' retrieved successfully.'
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
