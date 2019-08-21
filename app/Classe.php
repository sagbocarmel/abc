<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    //

    protected $table = '48c5m_classes';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'nom', 'description' , 'section', 'serie', 'idSection', 'idEtablissement'
    ];

}
