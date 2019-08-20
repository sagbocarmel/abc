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
     * @param $sectionRepository
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SectionsRequest $request)
    {
        //
        $section = $this->sectionRepository->store($request->all());

        return response()->json(['data'=> new Sections($section)],200);
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
        return response()->json(['data'=> new Sections($this->sectionRepository->find($id))],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SectionsRequest $request, $id)
    {
        //
        $this->sectionRepository->update($id,$request->all());
        return response()->json(['success' => true ,
                'message' => 'Section mis à jourgit avec succès'], 200);
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
        $this->sectionRepository->delete($id);
        return response()->json(['success' => true ,
            'message' => 'Section supprimée avec succès'], 200);
    }
}
