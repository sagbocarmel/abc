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
}
