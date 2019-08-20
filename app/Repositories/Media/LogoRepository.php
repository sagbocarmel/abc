<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 5:33 AM
 */

namespace App\Repositories\Media;


use App\Repositories\Media\StringHelper\StringUtility;
use Illuminate\Support\Str;

class LogoRepository implements MediaRepositoryInterface
{

    public function storefile($file, $name)
    {
        // TODO: Implement save() method.
        $names = '';
        if($file->isValid())
        {
            $chemin = config('logo_etablissement.path');
            $extension = $file->getClientOriginalExtension();

            do {
                 $nom = Str::random(10) .$name. '.' . $extension;
                 $names = $nom;
            } while(file_exists($chemin . '/' . $nom));

            $helper = new StringUtility($names);

            if($file->move($chemin, $nom))
            {
                return $helper;
            }
        }

       return new StringUtility('');
    }

    public function find($file)
    {
        // TODO: Implement find() method.
    }

    public function listFile($type)
    {
        // TODO: Implement listFile() method.
    }
}