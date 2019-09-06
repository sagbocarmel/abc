<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 7:01 PM
 */

namespace App\Repositories;


use App\Models\Profile;
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
        $this->profile->codeEtablissement = $inputs['codeEtablissement'];
        $this->profile->codeRole = $inputs['codeRole'];
        $this->profile->telUtilisateur = $inputs['telUtilisateur'];
        $this->profile->niveau = $inputs['niveau'];
        $this->profile->save();
        return $this->profile;
    }

    public function update($codeEtablissement, $telUtilisateur, array $inputs)
    {
        $this->profile = Profile::where('codeEtablissement',$codeEtablissement)->
            where('telUtilisateur',$telUtilisateur)->firstOrFail();
        $this->profile->codeEtablissement = $inputs['codeEtablissement'];
        $this->profile->codeRole = $inputs['codeRole'];
        $this->profile->telUtilisateur = $inputs['telUtilisateur'];
        $this->profile->niveau = $inputs['niveau'];
        $this->profile->save();
        return $this->profile;
    }

    public function find($codeEtablissement, $telUtilisateur)
    {
        return rofile::where('codeEtablissement',$codeEtablissement)->
        where('telUtilisateur',$telUtilisateur)->firstOrFail();
    }

    public function delete($codeEtablissement, $telUtilisateur)
    {
        $this->profile = Profile::where('codeEtablissement',$codeEtablissement)->
        where('telUtilisateur',$telUtilisateur)->delete();
    }

    public function findAll($codeEtablissement)
    {
        return Profile::where('codeEtablissement',$codeEtablissement)->
        get();
    }

    public function findAllByTel($telUtilisateur)
    {
        return Profile::where('telUtilisateur',$telUtilisateur)->
        firstOFail();
    }
}