<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/20/19
 * Time: 1:23 AM
 */

namespace App\Repositories\Media;


class ImageRepository implements MediaRepositoryInterface
{

    public function storefile($file, $name)
    {
        // TODO: Implement save() method.

        if($file->isValid())
        {
            $chemin = config('image_abc_s_m.path');
            $extension = $file->getClientOriginalExtension();

            do {
                $nom = Str::random(100000) .$name. '.' . $extension;
            } while(file_exists($chemin . '/' . $nom));

            if($file->move($chemin, $nom))
            {
                return [
                    'state' => true,
                    'name' => $nom,
                    'path' => $chemin
                ];
            }
        }

        return  [
        'state' => false,
        'name' => '',
        'path' => $chemin
        ];
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