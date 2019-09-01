<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/14/19
 * Time: 6:12 PM
 */

namespace App\Repositories;


use App\User;
use App\Models\Utilisateur;

class UserRepository implements UserRepositoryInterface
{

    protected $user;
    /**
     * UserRepository constructor.
     */
    public function __construct(Utilisateur $user)
    {
        $this->user = $user;
    }

    public function find($tel, $etablissement)
    {
        // TODO: Implement find() method.
        return $this->user->where('codeEtblissement',$etablissement)->where('tel',$tel)->firstOrFail();
    }

    public function findAll($etablissement)
    {
        // TODO: Implement findAll() method.
        return User::where('codeEtblissement',$etablissement);
    }

    public function update($tel, $etablissement, array $inputs)
    {
        $this->user = $this->user->where('codeEtblissement',$etablissement)->where('tel',$tel)->firstOrFail();
        $this->user->nom = $inputs['nom'];
        $this->user->prenoms = $inputs['prenoms'];
        $this->user->sexe = $inputs['sexe'];
        $this->user->email = $inputs['email'];
        $this->user->tel = $inputs['tel'];
        $this->user->tel2 = $inputs['tel2'];
        $this->user->password = $inputs['password'];
        $this->user->photo = $inputs['photo'];
        $this->user->save();
        return $this->user;
    }

    public function delete($tel, $etablissement)
    {
        return $this->user->where('codeEtblissement',$etablissement)->where('tel',$tel)->delete();
    }
}