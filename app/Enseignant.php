<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    //
    protected $table = '48c5m_enseignants';
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'nom', 'prenoms', 'sexe', 'email', 'tel1', 'tel2', 'dateNaissance', 'adresse', 'nationalite', 'photo', 'infoSup',
        'contactUrgence', 'mode', 'cv', 'idUtilisateur'
    ];

    public function user(){
        return $this->belongsTo('\App\User','idUtilisateur');
    }
}
