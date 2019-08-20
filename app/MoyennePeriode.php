<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoyennePeriode extends Model
{
    //
    /**
     * @var string
     */
    protected $primaryKey = 'idMoyennePeriode';

    protected $fillable = ['idClasse','idEleve','moyenne','mention'];

    protected $guarded = ['id','created_at','updated_at'];
}
