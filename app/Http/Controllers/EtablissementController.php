<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtablissementsRequest;
use App\Http\Resources\Etablissement;
use App\Repositories\EtablissementRepository;
use App\Repositories\Media\LogoRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EtablissementController extends Controller
{
     protected $etablissementRepository;
     protected $logoRepository;

    /**
     * EtablissementController constructor.
     * @param $etablissementRepository
     */
    public function __construct(EtablissementRepository $etablissementRepository,
                                LogoRepository $logoRepository)
    {
        $this->etablissementRepository = $etablissementRepository;
        $this->logoRepository = $logoRepository;
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
    public function create(EtablissementsRequest $request)
    {
        //
        $mytime = Carbon::now();
        $name =  preg_replace('/[^a-z\d ]/i', '_', $mytime->toDateTimeString().'_'.$request->nom);
        $name = str_replace(' ','',$name);
        $imageResult = $this->logoRepository->storefile($request->file('logo'),$name);
        $data = [
            'nom' => $request->nom,
            'description' => $request->description,
            'type' => $request->type,
            'nbPeriodesAnnee' => $request->nbPeriodesAnnee,
            'methodeCalculMoyennes' => $request->methodeCalculMoyennes,
            'logo' => $name,
            'dateCreation' => $request->dateCreation
            ];

        if($imageResult != '')
        {
            $data['logo'] = $imageResult->getName();

            $etablissement = new Etablissement($this->etablissementRepository->save($data));
            $files = response()->download(config('logo_etablissement.path').'/'.$etablissement->logo,$etablissement->nom);
            $response = [
                'success' => true,
                'etablissement_data' => $etablissement,
                'logo_etablissement' => $files
            ];
        }else{
            $etablissement = new Etablissement($this->etablissementRepository->save($data));
            $response = [
                'success' => true,
                'etablissement_data' => $etablissement,
                'logo_etablissement' => []
            ];
        }

        return response()->json(['data' => $response], 200);
        //return response()
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
        $result = $this->etablissementRepository->find($id);
        return response()->json([
            'data' => $result,
            'logo' => response()->download(config('logo_etablissement.path').'/'.$result->logo,$result->nom)
        ],200);
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
    public function update(EtablissementsRequest $request, $id)
    {
        //
        $data = [
            'nom' => $request->nom,
            'description' => $request->description,
            'type' => $request->type,
            'nbPeriodesAnnee' => $request->nbPeriodesAnnee,
            'methodeCalculMoyennes' => $request->methodeCalculMoyennes,
            'dateCreation' => $request->dateCreation
        ];

        $etablissement = new Etablissement($this->etablissementRepository->update($id,$data));
        $files = response()->download(config('logo_etablissement.path').'/'.$etablissement->logo,$etablissement->nom);
        $response = [
            'success' => true,
            'etablissement_data' => $etablissement,
            'logo_etablissement' => $files
        ];
        return response()->json(['data' => $response], 200);
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
        return response()->json([
            'data' => $this->etablissementRepository->delete($id)
        ],200);
    }
}
