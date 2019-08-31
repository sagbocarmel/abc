<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    //
    protected $table = '48c5m_bulletins';

    protected $fillable = [
        'codeAnnee',
        'codeEtablissement',
        'matriculeEleve',
        'periode',
        'bulletin'
    ];
}
