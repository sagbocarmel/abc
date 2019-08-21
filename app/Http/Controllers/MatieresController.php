<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AddMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;
use App\Http\Requests\SearchMatiereRequest;
use App\Matiere;
use App\Repositories\MatieresRepository;

use App\Repositories\MatieresRepositoryInterface as MatieresRepositoryInterface;

class MatieresController extends Controller
{

/*
    function __construct(MatieresRepositoryInterface $matiere){
        $this->matiere = $matiere;
    }

*/
    public function add(AddMatiereRequest $request){
        
        $success =  Matiere::create($request->all());

        //$success = $this->matiere->create($request);

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'Matière crée avec succès.'
        ];
        return response()->json($response, 200);

    }



    public function update(UpdateMatiereRequest $request){


        $matiere = Matiere::find($request->input('id'));

        $matiere->nom = $request->input('nom');
        $matiere->description = $request->input('description');
        $matiere->type = $request->input('type');

        $success = $matiere->update();

        //$success = $this->matiere->save($request);
        
        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'Matière supprimer avec succès'
        ];

        return response()->json($response, 200);

    }



    public function search(){

    }



    public function delete(SearchMatiereRequest $request){


        $matiere = Matiere::find($request->input('id'));
        $success = $matiere->delete();


        //$success = $this->matiere->delete($request->input('id'));

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'Matière supprimer avec succès'
        ];

        return response()->json($response, 200);
        
    }



    public function getList(){

        $matiere = Matiere::all();

        $response = [
            'success' => true,
            'data' => $matiere,
            'message' => 'Liste des matieres.'
        ];

        return response()->json($response, 200);

    }



    public function getDetails($id){

        $success = Matiere::find($id);

        //$success = $this->matiere->find($id);

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'Détails d\' matiere.'
        ];

        return response()->json($response, 200);
    }



    public function count(){

        $matiere = Matiere::count();
        
        $response = [
            'success' => true,
            'data' => $matiere,
            'message' => 'Matière crée avec succès.'
        ];

        return response()->json($response, 200);
    }

}
