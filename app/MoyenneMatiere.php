<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoyenneMatiere extends Model
{
    //
    /**
     * @var string
     */
    protected $primaryKey = 'idMoyenneMatiere';

    protected $fillable = ['idClasse','idEleve','idMatiere',
    						'moyenneComposition','periode','moyenneDevoir','moyenneInterrogation','moyenneInterroDevoirs', 'moyenneMatiere'];

    protected $guarded = ['id','created_at','updated_at'];
}
