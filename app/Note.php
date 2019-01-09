<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

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

    public function owner(){
        return $this->belongsTo(USER::class);
    }
    
}
