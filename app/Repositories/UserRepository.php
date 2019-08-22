<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/14/19
 * Time: 6:12 PM
 */

namespace App\Repositories;


use App\User;

class UserRepository implements UserRepositoryInterface
{

    protected $user;
    /**
     * UserRepository constructor.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return $this->user->findOrFail($id);
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
        return User::all();
    }

    public function update($id, array $inputs)
    {

    }
}