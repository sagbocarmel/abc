<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //

    protected $table = '48c5m_sections';

    protected $fillable = [
        'titre', 'description'
    ];

    public function classes(){
        return $this->belongsToMany('\App\Classes', '48c5m_classes');
    }
}
