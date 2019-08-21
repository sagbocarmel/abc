<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:45 AM
 */

namespace App\Repositories;


use App\Permissions;

class PermissionRepository implements PermissionRepositoryInterface
{
    protected $permission;

    /**
     * PermissionRepository constructor.
     * @param $permission
     */
    public function __construct(Permissions $permission)
    {
        $this->permission = $permission;
    }


    public function store(array $inputs)
    {
        // TODO: Implement store() method.
        $this->permission->titre = $inputs['titre'];
        $this->permission->description = $inputs['description'];
        $this->permission->save();
        $per = $this->permission;
        return $per;
    }

    public function update($id, array $inputs)
    {
        // TODO: Implement update() method.
        $permission = Permissions::find($id);
        $permission->titre = $inputs['titre'];
        $permission->description = $inputs['description'];
        $permission->save();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return Permissions::findOrFail($id);

    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        Permissions::destroy($id);
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
        return Permissions::all();

    }
}