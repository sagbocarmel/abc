<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 1:20 AM
 */

namespace App\Repositories\Media;


interface MediaRepositoryInterface
{
     public function storefile($file,$name);

     public function find($file);

     public function listFile($type);
}