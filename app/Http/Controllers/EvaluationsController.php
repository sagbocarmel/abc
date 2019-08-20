<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Evaluation;
use Illuminate\Support\Facades\Validator;

class EvaluationsController extends Controller
{
    //Ajout d'evaluation
    public function add(Request $request){
        $data = Validator::make($request->all(),[
            'titre' => 'required',
            'type' => 'required',
            'date' => 'required',
            'duree' => 'required',
            'periode' => 'required',
            'idClasse' => 'required',
            'idMatiere' => 'required'
        ]);

        if ($data->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $request->errors()
            ];
            return response()->json($response, 404);
        }

        $input = $request->all();
        $evaluation = Evaluation::create($input);

        $response = [
            'success' => true,
            'data' => $evaluation,
            'message' => 'Evaluation ajoutée avec succès.'
        ];

        return response()->json($response, 200);

    }

    //Mise à jour d'evaluation
    public function update(Request $request){
        $data = Validator::make($request->all(),[
            'titre' => 'required',
            'type' => 'required',
            'date' => 'required',
            'duree' => 'required',
            'periode' => 'required',
            'idClasse' => 'required',
            'idMatiere' => 'required'
        ]);

        if ($data->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $request->errors()
            ];
            return response()->json($response, 404);
        }

        $evaluation = DB::table('evaluations')->where('idClasse', $request->idClasse)
                ->where('idMatiere', $request->idMatiere)
                ->where('periode', $request->periode)
                ->update(array('titre' =>  $request->titre,
                          'type' =>  $request->type,
                          'date' =>  $request->date,
                          'duree' =>  $request->duree));


        $response = [
            'success' => true,
            'data' => $evaluation,
            'message' => 'Evaluation mise à jour avec succès.'
        ];

        return response()->json($response, 200);

    }

    
    //Recherche d'evaluation
    public function search(Request $request){
        $data = Validator::make($request->all(),[
            'id' => 'required'
        ]);

        if ($data->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $data->errors()
            ];
            return response()->json($response, 404);
        }

        $evaluation = DB::table('evaluations')->where('id', $request->id);
        $response = [
            'success' => true,
            'data' => $evaluation,
            'message' => 'Evaluation trouvée avec succès.'
        ];

        return response()->json($response, 200);
    }

    //Suppression d'evaluation
    public function delete(Request $request){

        $data = Validator::make($request->all(),[
            'titre' => 'required',
            'periode' => 'required',
            'idClasse' => 'required',
            'idMatiere' => 'required'
        ]);

        if ($data->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $request->errors()
            ];
            return response()->json($response, 404);
        }


        DB::table('evaluations')->where('titre', '=', $request->titre)
                ->where('idMatiere', '=', $request->idMatiere)
                ->where('idClasse', '=', $request->idClasse)
                ->where('periode', '=', $request->periode)
                ->delete();

        $response = [
            'success' => true,
            'data' => 'Supression',
            'message' => 'Evaluation supprimée avec succès.'
        ];

        return response()->json($response, 200);
    }

    
    //Liste des evaluations
    public function getList(Request $request){
        $evaluations = DB::table('evaluations')->get();
        $response = [
            'success' => true,
            'data' => $evaluations,
            'message' => 'Evaluation(s) trouvée(s) avec succès.'
        ];

        return response()->json($response, 200);
    }


    
    //Compte des evaluations
    public function count(Request $request){
        $count = DB::table('evaluations')->count();
        $response = [
            'success' => true,
            'data' => $count,
            'message' => 'Evaluation(s) trouvée(s) avec succès.'
        ];

        return response()->json($response, 200);
    }

    public function getDetails(Request $request){
        $data = Validator::make($request->all(),[
            'id' => 'required'
        ]);

        if ($data->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $data->errors()
            ];
            return response()->json($response, 404);
        }

        $evaluation = DB::table('evaluations')->where('id', $request->id);
        $response = [
            'success' => true,
            'data' => $evaluation,
            'message' => 'Details trouvés avec succès.'
        ];

        return response()->json($response, 200);
    }

    public function attribuerNotes(Request $request){
        
    }

   
}
