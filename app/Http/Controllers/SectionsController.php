<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionsRequest;
use App\Http\Resources\Sections;
use App\Repositories\SectionsRepository;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    protected $sectionRepository;

    /**
     * SectionsController constructor.
     * @param SectionsRepository $sectionRepository
     */
    public function __construct(SectionsRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
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
     * @param SectionsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(SectionsRequest $request)
    {
        //
        $data = [
            'titre' => $request->titre,
            'description' => $request->description
        ];
        $section = $this->sectionRepository->store($data);

        return response()->json(['data'=> new Sections($section)],200);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        //
        return response()->json(['data'=> new Sections($this->sectionRepository->find($id))],200);
    }

    /**
     * @param SectionsRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SectionsRequest $request, $id)
    {
        //
        $this->sectionRepository->update($id,$request->all());
        return response()->json(['success' => true ,
                'message' => 'Section mis à jour avec succès'], 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
        $this->sectionRepository->delete($id);
        return response()->json(['success' => true ,
            'message' => 'Section supprimée avec succès'], 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSections()
    {
        return response()->json(['data'=> $this->sectionRepository->findAll()], 200);
    }
}
