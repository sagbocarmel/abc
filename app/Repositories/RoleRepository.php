<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 6:59 PM
 */

namespace App\Repositories;


use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{

    protected $role;

    /**
     * RoleRepository constructor.
     * @param $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }


    public function store(array $inputs)
    {
        $this->role->codeRole = $inputs['titre'];
        $this->role->description = $inputs['description'];
        $this->role->save();
        $roles = $this->role;
        return $roles;
    }
    public function update($id, array $inputs)
    {
        $role = Role::find($id);
        $role ->codeRole = $inputs['titre'];
        $role ->description = $inputs['description'];
        $role->save();
    }

    public function find($id)
    {
        return Role::findOrFail($id);
    }

    public function delete($id)
    {
        Role::destroy($id);
    }

    public function findAll()
    {
        return Role::all();
    }

    public function findByRoleName($name)
    {
        //return Roles::where('titre',$name)->first()->get();
    }
}