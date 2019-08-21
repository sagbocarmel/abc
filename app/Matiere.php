<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    //
    protected $table = '48c5m_matieres';

    protected $fillable = [
        'nom', 'description', 'type'
    ];

    public function classes(){
        return $this->belongsToMany('\App\Classe', '48c5m_matieres_de_classes', 'idClasse');
    }

    public function enseignants(){
        return $this->belongsToMany('\App\Enseignant', '48c5m_matieres_de_classes', 'idMatiere');
    }

}
