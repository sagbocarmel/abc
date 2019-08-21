<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 8/11/19
 * Time: 7:47 AM
 */

namespace App\Repositories;


use App\Section;

class SectionsRepository implements SectionsRepositoryInterface
{
    protected $section;

    /**
     * SectionsRepository constructor.
     * @param $section
     */
    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    public function store(array $inputs)
    {
        // TODO: Implement store() method.
        $this->section->titre = $inputs['titre'];
        $this->section->description = $inputs['description'];
        $this->section->save();
        $section = $this->section;
        return $section;
    }

    public function update($id, $inputs)
    {
        // TODO: Implement update() method.
        $section = Section::find($id);
        $section->titre = $inputs['titre'];
        $section->description = $inputs['description'];
        $section->save();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return Section::findOrFail($id);
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
        return Section::all();
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        Section::destroy($id);
    }
}