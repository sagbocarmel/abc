<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoyenneAnnuelle extends Model
{
    //
    /**
     * @var string
     */
    protected $primaryKey = 'idMoyenneAnnuelle';

    protected $fillable = ['idClasse','idEleve','idEvaluation',
    						'notes','periode','moyenne','mention','decision'];

    protected $guarded = ['id','created_at','updated_at'];
}
