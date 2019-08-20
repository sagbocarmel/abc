<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Note;
use Illuminate\Support\Facades\Validator;

class NotesController extends Controller
{
    
    //Insertion de la note
    public function insertNote(Request $request){

    	$data = Validator::make($request->all(),[
    		'idEleve' => 'required',
    		'idEvaluation' => 'required',
            'notes' => 'required'
    		
        ]);

        if ($data->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $data->errors()
            ];
            return response()->json($response, 404);
        }

        $input = $request->all();
        $note = Note::create($input);
      	

    	$response = [
            'success' => true,
            'data' => $note,
            'message' => 'Note insérée avec succès.'
        ];

        return response()->json($response, 200);
    }

    //Mise à jour de la note
    public function updateNote(Request $request){

    	$data = Validator::make($request->all(),[
    		'idEleve' => 'required',
    		'idEvaluation' => 'required',
            'notes' => 'required'
        ]);

    	if ($data->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }
        $note = DB::table('notes')->where('idEvaluation', $request->idEvaluation)
        					->where('idEleve', $request->idEleve)
        					->update(array('notes' => $request->notes));

    	$response = [
            'success' => true,
            'data' => $note,
            'message' => 'Note mise à jour avec succès.'
        ];

        return response()->json($response, 200);
    	
    }


    //Suppression de la note
    public function deleteNote(Request $request){
    	
    	$data = Validator::make($request->all(),[
    		'notes' => 'required',
    		'idEleve' => 'required',
    		'idEvaluation' => 'required'
    	]);

    	if ($data->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $data->errors()
            ];
            return response()->json($response, 404);
        }

    	DB::table('notes')->where('idEleve', '=', $request->idEleve)
    			->where('idEvaluation', '=', $request->idEvaluation)
    			->delete();

    	$response = [
            'success' => true,
            'data' => 'Supression',
            'message' => 'Note supprimée avec succès.'
        ];

        return response()->json($response, 200);
    }

    //Recherche de la note
    public function searchNote(Request $request){
    	$data = Validator::make($request->all(),[
    		'idEleve' => 'required',
    		'idEvaluation' => 'required'
    	]);

    	if ($data->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $data->errors()
            ];
            return response()->json($response, 404);
        }

        $note = DB::table('notes')->where('idEvaluation', $request->idEvaluation)
        					->where('idEleve', $request->idEleve);
        $response = [
            'success' => true,
            'data' => $note,
            'message' => 'Note(s) trouvée(s) avec succès.'
        ];

        return response()->json($response, 200);
    }

    //Liste de notes
    public function getListNote(){
    	$note = DB::table('notes')->get();
    	$response = [
            'success' => true,
            'data' => $note,
            'message' => 'Note(s) trouvée(s) avec succès.'
        ];

        return response()->json($response, 200);
    }
}
