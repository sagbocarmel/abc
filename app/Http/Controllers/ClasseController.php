<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassesRequest;
use App\Http\Resources\Classe;
use App\Http\Resources\Classes;
use App\Repositories\ClasseRepository;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    protected $classeRepository;

    /**
     * ClasseController constructor.
     * @param $classeRepository
     */
    public function __construct(ClasseRepository $classeRepository)
    {
        $this->classeRepository = $classeRepository;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ClassesRequest $request)
    {
        //
        $data = [
            'nom' => $request->nom,
            'description' => $request->description,
            'section' => $request->section,
            'serie' => $request->serie,
            'idSection' => $request->idSection,
            'idEtablissement' => $request->idEtablissement
        ];
        $classe = $this->classeRepository->store($data);

        return response()->json(['data'=> new Classe($classe)],200);
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
        return response()->json(['data'=> new Classe($this->classeRepository->find($id))],200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassesRequest $request, $id)
    {
        //
        $this->classeRepository->update($id,$request->all());
        return response()->json(['success' => true ,
            'message' => 'Classe mis à jour avec succès'], 200);
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
        $this->classeRepository->delete($id);
        return response()->json(['success' => true ,
            'message' => 'Classe supprimée avec succès'], 200);
    }

    public function getClasses(){
        return response()->json(['data'=> new Classes($this->classeRepository->findAll())],200);
    }
}
