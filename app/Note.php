<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Mail\NoteDeleted;
use App\Mail\NoteUpdated;

class Note extends Model
{
    //protected
    //protected $fillable = ['title','details','color'];
    protected $guarded = ['id'];

    //hook
    protected static function boot(){
        parent::boot();
        static::deleted(function($note){
            \Mail::to($note->owner->email)->send(
                new NoteDeleted($note)
            );
        });

        static::updated(function($note){
            \Mail::to($note->owner->email)->send(
                new NoteUpdated($note)
            );
        });
    }

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
