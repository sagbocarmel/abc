<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:25 AM
 */

namespace App\Repositories;

use App\Http\Requests\AddMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;
use App\Repositories\MatieresRepositoryInterface as MatieresRepositoryInterface
use App\Matiere;

class MatieresRepository implements MatieresRepositoryInterface
{
	protected Matiere $matiere;

	public __construct(Matiere $matiere){
		$this->matiere = $matiere;
	}

	public function create(AddMatiereRequest $request){
		return Matiere::create($request->all());
	}

	public static function getAll(){
		return $this->matiere->getAll();
	}

	public function delete($id){
		return $this->matiere->delete($id);
	}

	public static function find($id){
		return $this->matiere->find($id);
	}

	public function save(UpdateMatiereRequest $request){

		$element = $this->matiere->find($request->input('id'));

		$element->nom = $request->input('nom');
        $element->description = $request->input('description');
        $element->type = $request->input('type');

        return $element->update();
	}


}