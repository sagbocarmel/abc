<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    /**
     * @var array
     */
    //protected $primaryKey = ['idEleve','idEvaluation'];

    protected $fillable = ['idEleve','idEvaluation','notes'];

    protected $guarded = ['created_at','updated_at'];

}
