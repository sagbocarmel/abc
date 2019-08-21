<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 7:01 PM
 */

namespace App\Repositories;


use App\Profile;
use PhpParser\Node\Expr\Array_;

class ProfileRepository implements ProfileRepositoryInterface
{
    protected $profile;

    /**
     * ProfileRepository constructor.
     * @param $profile
     */
    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }


    public function store(array $inputs)
    {
        // TODO: Implement store() method.
        $this->profile->idRole = $inputs['idRole'];
        $this->profile->idEtablissement = $inputs['idEtablissement'];
        $this->profile->save();
        $profile = $this->profile;
        return $profile;
    }

    public function update($id, Array_ $inputs)
    {
        // TODO: Implement update() method.
        $profile = Profile::find($id);
        $profile->idRole = $inputs['idRole'];
        $profile->idEtablissement = $inputs['idEtablissement'];
        $profile->save();

    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return Profile::findOrFail($id);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        Profile::destroy($id);
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
        return Profile::all();
    }
}