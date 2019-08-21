<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:26 AM
 */

namespace App\Repositories;


interface MatieresRepositoryInterface
{
	public function create();

	public static function getAll();

	public function delete();

	public static function find($id);

	public function save();
}