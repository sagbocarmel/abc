<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{

    protected $table = '48c5m_Cours';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'codeEtablissement',
        'niveau' ,
        'codeClasse',
        'anneEtude',
        'serie',
        'codeSection'
    ];
}
