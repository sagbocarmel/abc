<?php

namespace App\Http\Controllers;

use App\Repositories\BulletinRepository;
use Illuminate\Http\Request;

class BulletinController extends Controller
{
    protected $bulletinRepository;

    /**
     * BulletinController constructor.
     * @param BulletinRepository $bulletinRepository
     */
    public function __construct(BulletinRepository $bulletinRepository)
    {
        $this->bulletinRepository = $bulletinRepository;
    }


    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $periode
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($codeEtablissement, $codeAnnee, $periode)
    {
        $bulletins = $this->bulletinRepository->findAll($codeEtablissement, $codeAnnee, $periode);

        $response = [
            'success' => true,
            'bulletins' => $bulletins
        ];

        return response()->json(['data' => $response], 200);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $bulletin = $this->bulletinRepository->store($request->all());

        $response = [
            'success' => true,
            'bulletin' => $bulletin
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $matriculeEleve
     * @param $periode
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($codeEtablissement, $codeAnnee, $matriculeEleve, $periode)
    {
        $bulletin = $this->bulletinRepository->find($codeEtablissement, $codeAnnee, $matriculeEleve, $periode);

        $response = [
            'success' => true,
            'bulletin' => $bulletin
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param Request $request
     * @param $codeEtablissementr
     * @param $codeAnneer
     * @param $matriculeElever
     * @param $perioder
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $codeEtablissementr, $codeAnneer, $matriculeElever, $perioder)
    {
        $bulletin = $this->bulletinRepository->update($codeEtablissementr, $codeAnneer, $matriculeElever, $perioder, $request->all());

        $response = [
            'success' => true,
            'bulletin' => $bulletin,
            'message' => 'Update end succesfully'
        ];

        return response()->json(['data' => $response], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $codeAnnee
     * @param $matriculeEleve
     * @param $periode
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($codeEtablissement, $codeAnnee, $matriculeEleve, $periode)
    {
        $this->bulletinRepository->delete($codeEtablissement, $codeAnnee, $matriculeEleve, $periode);

        $response = [
            'success' => true,
            'message' => 'Operation end'
        ];

        return response()->json(['data' => $response], 200);
    }
}
