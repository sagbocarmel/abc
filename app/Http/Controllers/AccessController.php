<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionDeRoleRequest;
use App\Http\Requests\PermissionsRequest;
use App\Http\Requests\RolesRequest;
use App\Http\Resources\Role;
use App\Http\Resources\Roles;
use App\Permissions;
use App\PermissionsDeRole;
use App\Repositories\PermissionRepository;
use App\Repositories\PermissionsDeRoleRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccessController extends Controller
{
    //

    protected $roleRepository;
    protected $permissionRepository;
    protected $permissionDeRoleRepository;
    protected $profilRepository;

    /**
     * AccessController constructor.
     * @param $roleRepository
     * @param $permissionRepository
     * @param $profilRepository
     */
    public function __construct(PermissionsDeRoleRepository $permissionDeRoleRepository, RoleRepository $roleRepository,PermissionRepository $permissionRepository,ProfileRepository $profilRepository)
    {
        $this->permissionDeRoleRepository = $permissionDeRoleRepository;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
        $this->profilRepository = $profilRepository;
    }

    public function createRole(RolesRequest $request){
        $data = [
            'titre' => $request->titre,
            'description' => $request->description
        ];
        $role = $this->roleRepository->store($data);

        return response()->json(['data'=> new Role($role)],200);
    }

    public function updateRole($id, RolesRequest $request){
        $this->roleRepository->update($id,$request->all());
        return response()->json(['success' => true ,
            'message' => 'Role mis à jour avec succès'], 200);
    }

    public function getRole($id){
        return response()->json(['data'=> new Role($this->roleRepository->find($id))],200);
    }

    public function deleteRole($id){
        $this->roleRepository->delete($id);
        return response()->json(['success' => true ,
            'message' => 'Role supprimée avec succès'], 200);
    }

    public function getRoles(){
        return response()->json(['data'=> new Roles($this->roleRepository->findAll())],200);
    }

    public function getRoleDetails(){

    }

    public function countRole(){

    }

    public function createPermission(PermissionsRequest $request){
        $data = [
            'titre' => $request->titre,
            'description' => $request->description
        ];
        $permission = $this->permissionRepository->store($data);

        return response()->json(['data'=> new \App\Http\Resources\Permissions($permission)],200);
    }

    public function updatePermission($id, PermissionsRequest $request){
        $this->permissionRepository->update($id,$request->all());
        return response()->json(['success' => true ,
            'message' => 'Permission mis à jour avec succès'], 200);
    }

    public function getPermission($id){
        return response()->json(['data'=> new \App\Http\Resources\Permissions($this->permissionRepository->find($id))],200);
    }

    public function deletePermission($id){
        $this->permissionRepository->delete($id);
        return response()->json(['success' => true ,
            'message' => 'Permission supprimée avec succès'], 200);
    }

    public function getPermissions(){
        return response()->json(['data'=> $this->permissionRepository->findAll()],200);
    }

    public function getPermissionDetails(){

    }

    public function countPermission(){

    }

    public function createRolePermission(PermissionDeRoleRequest $request){
        $data = [
            'idPermission' => $request->idPermission,
            'idRole' => $request->idRole
        ];
        $rolepermission = $this->permissionDeRoleRepository->store($data);

        return response()->json(['data'=> $rolepermission],200);
    }

    public function deleteRolePermission($id, $id_permission){
        $this->permissionDeRoleRepository->delete($id,$id_permission);
        return response()->json(['success' => true ,
            'message' => 'Accès supprimé avec succès'], 200);
    }

}
