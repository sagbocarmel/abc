<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:44 AM
 */

namespace App\Repositories;


use App\Models\Parents;

class ParentsRepository implements ParentsRepositoryInterface
{
    protected $parent;

    /**
     * ParentsRepository constructor.
     * @param $parent
     */
    public function __construct(Parents $parent)
    {
        $this->parent = $parent;
    }

    public function store(array $inputs)
    {
        $this->parent = new Parents();
        $this->parent->nom = $inputs['nom'];
        $this->parent->prenoms = $inputs['prenoms'];
        $this->parent->sexe = $inputs['sexe'];
        $this->parent->email = $inputs['email'];
        $this->parent->tel = $inputs['tel'];
        $this->parent->tel2 = $inputs['tel2'];
        $this->parent->langueLocale = $inputs['langueLocale'];
        $this->parent->profession = $inputs['profession'];
        $this->parent->password = $inputs['password'];
        $this->parent->photo = $inputs['photo'];
        $this->parent->save();
        return $this->parent;
    }

    public function update($tel, array $inputs)
    {
        $this->parent = Parents::where('tel',$tel)->firstOrFail();
        $this->parent->nom = $inputs['nom'];
        $this->parent->prenoms = $inputs['prenoms'];
        $this->parent->sexe = $inputs['sexe'];
        $this->parent->email = $inputs['email'];
        $this->parent->tel = $inputs['tel'];
        $this->parent->tel2 = $inputs['tel2'];
        $this->parent->langueLocale = $inputs['langueLocale'];
        $this->parent->profession = $inputs['profession'];
        $this->parent->password = $inputs['password'];
        $this->parent->photo = $inputs['photo'];
        $this->parent->save();
        return $this->parent;
    }

    public function find($tel)
    {
        return Parents::where('tel',$tel)->firstOrFail();
    }

    public function delete($tel)
    {
        Parents::where('tel',$tel)->delete();
    }

    public function findAll()
    {
        return Parents::all();
    }
}