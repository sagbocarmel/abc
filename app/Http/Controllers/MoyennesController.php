<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\MoyenneMatiere;
use App\MoyenneAnnuelles;
use App\MoyennePeriodes;
use Illuminate\Support\Facades\Validator;

class MoyennesController extends Controller
{
    
    //
    public function search() {

    }

    public function updateMoyenneMatiere(Request $request) {

        $data = Validator::make($request->all(), [
            'idClasse' => 'required',
            'idMatiere' => 'required',
            'idEleve' => 'required',
            'periode' => 'required',
            'moyenneMatiere' => 'required',
            'moyenneComposition' => 'required',
            'moyenneDevoir' => 'required',
            'moyenneInterrogation' => 'required',
            'moyenneInterroDevoirs' => 'required'
        ]);

        if ($data->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $data->errors()
            ];
            return response()->json($response, 404);
        }
        $moyenne = DB::table('moyenne_matieres')->where('idEleve', $request->idEleve)
                ->where('idMatiere', $request->idMatiere)
                ->where('idClasse', $request->idClasse)
                ->where('periode', $request->periode)
                ->update(array('moyenneComposition' => $request->moyenneComposition,
                          'moyenneDevoir' => $request->moyenneDevoir,
                          'moyenneInterrogation' => $request->moyenneInterrogation,
                          'moyenneInterroDevoirs' => $request->moyenneInterroDevoirs,
                          'moyenneMatiere' => $request->moyenneMatiere));

        $response = [
            'success' => true,
            'data' => $moyenne,
            'message' => 'Moyennes Matiere mise à jour avec succès.'
        ];

        return response()->json($response, 200);
    }

    public function updateMoyennePeriode(Request $request) {
        $data = Validator::make($request->all(), [
            'idClasse' => 'required',
            'mention' => 'required',
            'idEleve' => 'required',
            'moyenne' => 'required'
        ]);

        if ($data->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $data->errors()
            ];
            return response()->json($response, 404);
        }

        $moyenne = DB::table('moyenne_periodes')->where('idEleve', $request->idEleve)
                ->where('idClasse', $request->idClasse)
                ->update(['mention' => $request->mention,
                          'moyenne' => $request->moyenne]);

        $response = [
            'success' => true,
            'data' => $moyenne,
            'message' => 'Moyennes Periode mise à jour avec succès.'
        ];

        return response()->json($response, 200);
    }

    public function updateMoyenneAnnuelle(Request $request) {
        $data = Validator::make($request->all(), [
            'idClasse' => 'required',
            'idEleve' => 'required',
            'periode' => 'required',
            'moyenne' => 'required',
            'mention' => 'required',
            'decision' => 'required'
        ]);

        if ($data->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $data->errors()
            ];
            return response()->json($response, 404);
        }

        $moyenne = DB::table('moyenne_annuelles')->where('idEleve', $request->idEleve)
                ->where('idClasse', $request->idClasse)
                ->where('periode', $request->periode)
                ->update(['idClasse' => $request->idClasse,
                          'mention' => $request->mention,
                          'moyenne' => $request->moyenne,
                          'decision' => $request->decision]);

        $response = [
            'success' => true,
            'data' => $moyenne,
            'message' => 'Moyennes Annuelle mise à jour avec succès.'
        ];

        return response()->json($response, 200);
    }

    public function calculerMoyenneMatiere() {
        
    }

    public function calculerMoyennePeriode() {
        
    }

    public function calculerMoyenneAnnuelle() {

    }

    public function calculerMoyenneInterrogations() {

    }

    public function calculerMoyenneInterroDevoirs() {

    }


}
