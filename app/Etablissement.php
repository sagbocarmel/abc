<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    //
    protected $table = '48c5m_etablissements';
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'nom', 'description', 'type', 'nbPeriodesAnnee', 'methodeCalculMoyennes','logo', 'dateCreation'
    ];

    public function profiles(){
        return $this->belongsToMany('\App\Profile', '48c5m_profiles','idEtablissement');
    }

    public function classes(){
        return $this->belongsToMany('\App\Classe','48c5m_classes','idEtablissement');
    }
}
