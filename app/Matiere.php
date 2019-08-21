<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    //
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = ['id','nom','description','type'];
  /*
  
    public function getAll(){
    	return static::all();
    }
    
    public function find($id){
    	return static::find($id);
    }

    public function delete($id){
    	//return static::find($id)->delete();
    }
*/
}
