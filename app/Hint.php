<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hint extends Model
{
    //protected
    //protected $fillable=[];
    protected $guarded=['id'];


    public function completed($value = true){
    	$this->update(['completed'=>$value]);
    }

    public function incompleted(){
    	$this->completed(false);
    }
}
