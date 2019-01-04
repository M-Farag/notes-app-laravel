<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hint;
use App\Note;

class NotesHintsController extends Controller
{
    //
    public function update(Hint $hint){
    	request()->has('completed')? $hint->completed() : $hint->incompleted();
        return back();
    }

    public function store(Note $note){
    	//validation
    	$validated = request()->validate( [ 'body'=>'required' ] );
    	$note->addHint($validated);
    	return back();
    }
}
