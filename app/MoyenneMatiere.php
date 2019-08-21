<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoyenneMatiere extends Model
{
    //
    /**
     * @var string
     */

    protected $primaryKey = 'id';

    protected $fillable = ['id','moyenneComposition','periode','moyenneDevoir','moyenneInterrogation','moyenneInterroDevoirs','MoyenneMatiere','idClasse','idMatiere','idEleve','periode'];

    
}
