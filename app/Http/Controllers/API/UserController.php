<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenoms' => 'required',
            'sexe' => 'required',
            'email' => 'required|email',
            'tel1' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

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
}
