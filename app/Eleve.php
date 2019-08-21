<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    //
    protected $table = '48c5m_eleves';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'nom', 'prenoms', 'sexe', 'email', 'tel1', 'tel2', 'dateNaissance', 'adresse', 'nationalite', 'photo', 'infoSup',
        'matricule', 'idUtilisateur', 'idClasse'
    ];

    public function parents()
    {
        return $this->belongsToMany('\App\ParentEleve', '48c5m_eleves_de_parents', 'idEleve');
    }

    public function user()
    {
        return $this->belongsTo('\App\User', 'idUtilisateur');
    }

    public function classe()
    {
        return $this->belongsTo('\App\Classe', 'idClasse');
    }

    public function notes()
    {
        return $this->belongsToMany('\App\Note', '48c5m_notes', 'matriculeEleve');
    }
}
