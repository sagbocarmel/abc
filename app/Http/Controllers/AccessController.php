<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroitsRequest;
use App\Http\Requests\PermissionDeRoleRequest;
use App\Http\Requests\PermissionsRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RolesRequest;
use App\Http\Resources\Role;
use App\Http\Resources\Roles;
use App\Permissions;
use App\PermissionsDeRole;
use App\Repositories\DroitsRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\PermissionsDeRoleRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccessController extends Controller
{
    //

    protected $roleRepository;
    protected $droitsRepository;
    protected $profilRepository;

    /**
     * AccessController constructor.
     * @param RoleRepository $roleRepository
     * @param DroitsRepository $droitsRepository
     * @param ProfileRepository $profilRepository
     */
    public function __construct(RoleRepository $roleRepository,
                                DroitsRepository $droitsRepository,
                                ProfileRepository $profilRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->droitsRepository = $droitsRepository;
        $this->profilRepository = $profilRepository;
    }

    /**
     * @param RolesRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createRole(RolesRequest $request){
        $data = [
            'titre' => $request->titre,
            'description' => $request->description
        ];
        $role = $this->roleRepository->store($data);

        return response()->json(['data'=> new Role($role)],200);
    }

    /**
     * @param $id
     * @param RolesRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateRole($id, RolesRequest $request){
        $this->roleRepository->update($id,$request->all());
        return response()->json(['success' => true ,
            'message' => 'Role mis à jour avec succès'], 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRole($id){
        return response()->json(['data'=> new Role($this->roleRepository->find($id))],200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteRole($id){
        $this->roleRepository->delete($id);
        return response()->json(['success' => true ,
            'message' => 'Role supprimée avec succès'], 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRoles(){
        $profiles = $this->profilRepository->findAllByTel(Auth::user()->tel);
        $roles  = $this->roleRepository->findAll();
        if($profiles != null  && ($profiles->codeRole == 'SuperAdmin' || $profiles->codeRole == 'SuperAdmin0' ||
                $profiles->codeRole == 'SuperAdmin1'))
        {
            return response()->json(['data'=> $roles],200);
        }
        foreach ($roles as $role)
        {
            if($role->codeRole == 'SuperAdmin' || $role->codeRole == 'SuperAdmin0'
                || $role->codeRole == 'SuperAdmin1'
                ||
                $role->codeRole == 'SuperUser'){
                if (($key = array_search($role, $roles)) !== false) {
                    unset($roles[$key]);
                }
            }
        }
        return response()->json(['data'=> $roles],200);
    }

    /**
     * @param DroitsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDroit(DroitsRequest $request){
        $data = [
            'codeRole' => $request->codeRole,
            'codeElement' => $request->codeElement,
            'droit' => $request->droit,
        ];
        $droit = $this->droitsRepository->store($data);

        return response()->json(['data'=> $droit],200);
    }

    /**
     * @param $codeRole
     * @param $codeElement
     * @param $droits
     * @param DroitsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateDroit($codeRole,$codeElement, $droit, DroitsRequest $request){
        $this->droitsRepository->update($codeRole,$codeElement,$droit, $request->all());
        return response()->json(['success' => true ,
            'message' => 'Droit mis à jour avec succès'], 200);
    }

    public function getDroit($codeRole,$codeElement, $droits){
        return response()->json(['data'=>$this->droitsRepository->find($codeRole,$codeElement, $droits)],200);
    }

    /**
     * @param $codeRole
     * @param $codeElement
     * @param $droits
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDroit($codeRole,$codeElement, $droits){
        $this->droitsRepository->delete($codeRole,$codeElement, $droits);
        return response()->json(['success' => true ,
            'message' => 'Permission supprimée avec succès'], 200);
    }

    /**
     * @param $codeRole
     * @param $codeElement
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDroits($codeRole,$codeElement){
        return response()->json(['data'=> $this->droitsRepository->findAll($codeRole,$codeElement)],200);
    }

    /**
     * @param ProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProfile(ProfileRequest $request){

        $profiles = $this->profilRepository->store($request->all());

        return response()->json(['data'=> ['success' => true ,
            'profile' => $profiles]],200);
    }

    /**
     * @param $codeEtablissement
     * @param $telUtilisateur
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProfile($codeEtablissement, $telUtilisateur){
        $this->profilRepository->delete($codeEtablissement,$telUtilisateur);
        return response()->json(['success' => true ,
            'message' => 'Profile supprimé avec succès'], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $telUtilisateur
     * @param ProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile($codeEtablissement, $telUtilisateur, ProfileRequest $request){
        $profiles = $this->profilRepository->update($codeEtablissement,$telUtilisateur,$request->all());
        return response()->json(['data'=>['success' => true ,
            'profile' => $profiles]], 200);
    }

    /**
     * @param $codeEtablissement
     * @param $telUtilisateur
     * @return \Illuminate\Http\JsonResponse
     */
    public function showProfile($codeEtablissement, $telUtilisateur){
        $profile = $this->profilRepository->find($codeEtablissement, $telUtilisateur);
        return response()->json(['data'=>['success' => true ,
            'profile' => $profile]], 200);
    }

    /**
     * @param $codeEtablissement
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexProfile($codeEtablissement){
        $profiles = $this->profilRepository->findAll($codeEtablissement);
        return response()->json(['data'=>['success' => true ,
            'profiles' => $profiles]], 200);
    }
}
