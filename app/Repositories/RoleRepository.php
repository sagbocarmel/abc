<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 6:59 PM
 */

namespace App\Repositories;


use App\Roles;

class RoleRepository implements RoleRepositoryInterface
{

    protected $role;

    /**
     * RoleRepository constructor.
     * @param $role
     */
    public function __construct(Roles $role)
    {
        $this->role = $role;
    }


    public function store(array $inputs)
    {
        // TODO: Implement store() method.
        $this->role->titre = $inputs['titre'];
        $this->role->description = $inputs['description'];
        $this->role->save();
        $roles = $this->role;
        return $roles;
    }
    public function update($id, array $inputs)
    {
        // TODO: Implement update() method.
        $role = Roles::find($id);
        $role ->titre = $inputs['titre'];
        $role ->description = $inputs['description'];
        $role->save();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return Roles::findOrFail($id);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        Roles::destroy($id);
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.

        return Roles::all();
    }
}