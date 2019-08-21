<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    //
    protected $table = '48c5m_evaluations';

    protected $fillable = [
        'titre', 'type', 'date', 'duree', 'periode', 'idClasse', 'idMatiere'
    ];

    public function classe(){
        return $this->belongsTo('\App\Classe', 'idClasse');
    }

    public function matiere(){
        return $this->belongsTo('\App\Matiere','idMatiere');
    }
}
