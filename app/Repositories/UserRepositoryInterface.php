<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/14/19
 * Time: 6:12 PM
 */

namespace App\Repositories;


interface UserRepositoryInterface
{
    public function find($id);
}