<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 2:45 PM
 */

namespace App\Repositories\Media\StringHelper;


use Illuminate\Support\Str;

class StringUtility
{
    protected $name;

    /**
     * StringUtility constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}