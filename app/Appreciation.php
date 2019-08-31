<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appreciation extends Model
{
    //
    protected $table = '48c5m_Appreciations';

    protected $fillable = [
        'codeEtablissement',
        'codeAnnee',
        'matriculeEleve',
        'niveau',
        'codeClasse',
        'codeMatiere',
        'codeEvaluation',
        'periode',
        'appreciation',
        'dateAppreciation'
    ];
}
