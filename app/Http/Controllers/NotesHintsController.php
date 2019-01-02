<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hint;

class NotesHintsController extends Controller
{
    //
    public function update(Hint $hint){
    	$hint->update(['completed'=>request()->has('completed')]);
    	return back();
    }
}
