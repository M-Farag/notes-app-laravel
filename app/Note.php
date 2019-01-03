<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //protected
    //protected $fillable = ['title','details','color'];
    protected $guarded = ['id'];

    //relate to hints
    public function hints(){
    	return $this->hasMany(Hint::class);
    }

    public function addHint($body){
    	$this->hints()->create($body);
    }
    
}
