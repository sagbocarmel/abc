<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentEleve extends Model
{
    //
    protected $table = '48c5m_parent_eleves';

    protected $fillable = [
        'nom', 'prenoms', 'sexe', 'email', 'tel1', 'tel2', 'langueLocale', 'profession',
        'idUtilisateur'
    ];

    public function user(){
        return $this->hasOne('\App\User','idUtilisateur');
    }

    public function eleves(){
        return $this->belongsToMany('\App\Eleve', '48c5m_eleves_de_parents');
    }
}
