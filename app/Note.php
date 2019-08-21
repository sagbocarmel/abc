<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    protected $table = '48c5m_notes';

    protected $fillable = [
        'idEleve', 'idEvaluation', 'matriculeEleve', 'notes'
    ];

    public function eleve(){
        return $this->belongsTo('\App\Eleve', ['idEleve','matriculeEleve']);
    }

    public function evalution(){
        return $this->belongsTo('\App\Evaluation', 'idEvaluation');
    }
}
