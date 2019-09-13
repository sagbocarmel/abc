<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParentsRequest;
use App\Repositories\ParentsRepository;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    protected $parentsRepository;

    /**
     * ParentsController constructor.
     * @param ParentsRepository $parentsRepository
     */
    public function __construct(ParentsRepository $parentsRepository)
    {
        $this->parentsRepository = $parentsRepository;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $parents = $this->parentsRepository->findAll();

        $response = [
            'success' => true,
            'parents' => $parents
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param ParentsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ParentsRequest $request)
    {
        $parentSaved = $this->parentsRepository->store($request->all());

        $response = [
            'success' => true,
            'parent' => $parentSaved
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param $tel
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($tel)
    {
        $parent = $this->parentsRepository->find($tel);

        $response = [
            'success' => true,
            'parent' => $parent
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param ParentsRequest $request
     * @param $tel
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ParentsRequest $request, $tel)
    {
        $parentSaved = $this->parentsRepository->update($tel,$request->all());

        $response = [
            'success' => true,
            'parent' => $parentSaved
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param $tel
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($tel)
    {
       $this->parentsRepository->delete($tel);

        $response = [
            'success' => true,
            'message' => 'Operation end successfully'
        ];

        return response()->json(['data' => $response], 200);
    }
}
