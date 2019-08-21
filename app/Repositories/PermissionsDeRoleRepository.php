<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:56 AM
 */

namespace App\Repositories;


use App\PermissionsDeRole;
use Illuminate\Support\Facades\DB;

class PermissionsDeRoleRepository implements PermissionsDeRoleRepositoryInterface
{
    protected $permissionsDeRole;

    /**
     * PermissionsDeRoleRepository constructor.
     * @param $ppermissionsDeRole
     */
    public function __construct(PermissionsDeRole $permissionsDeRole)
    {
        $this->permissionsDeRole = $permissionsDeRole;
    }


    public function store(array $inputs)
    {
        // TODO: Implement store() method.
        $this->permissionsDeRole->idPermission = $inputs['idPermission'];
        $this->permissionsDeRole->idRole = $inputs['idRole'];
        $this->permissionsDeRole->save();
        return $this->permissionsDeRole;
    }

    public function update($idRole, $idPermission, array $inputs)
    {
        // TODO: Implement update() method.
        $element = $this->permissionsDeRole->where(['idPermission','idRole'],[$idPermission,$idRole]);
        $element->idPermission =  $inputs['idPermission'];
        $element->idRole =  $inputs['idRole'];
        $element->save();
    }

    public function findByPermission($id)
    {
        // TODO: Implement findByPermission() method.
    }

    public function findByRole($id)
    {
        // TODO: Implement findByRole() method.
    }

    public function find($idRole, $idPermission)
    {
        // TODO: Implement find() method.
    }

    public function delete($idRole, $idPermission)
    {
        // TODO: Implement delete() method.
        DB::table('48c5m_permissions_de_roles')->where('idPermission',$idPermission)
            ->where('idRole',$idRole)->delete();
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }
}