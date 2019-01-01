<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //protected
    //protected $fillable = ['title','details','color'];
    protected $guarded = ['id'];
    
}
