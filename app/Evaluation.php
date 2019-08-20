<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    //
    /**
     * @var string
     */
    protected $primaryKey = 'idEvaluation';

    protected $fillable = ['titre',
            'type',
            'date',
            'duree',
            'periode',
            'idClasse',
            'idMatiere'];
}
