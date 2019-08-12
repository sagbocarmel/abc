<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    /**
     * @var array
     */
    protected $primaryKey = ['idEleve','idEvaluation'];
}
