<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use App\Mail\NoteCreated;
class NotesController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('notes.index')->with([
            // 'notes'=>Note::where('owner_id',auth()->id())->get(),
            'notes'=>auth()->user()->notes,
            'user'=> auth()->user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validation
        $validated = $this->validatedNotes($request);
        //appending owner_id
        $validated['owner_id'] = auth()->id();
        $note = Note::create($validated);
        //send Mail
        \Mail::to($note->owner->email)->send(
            new NoteCreated($note)
        );
        return redirect('notes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //authorize
            $this->authorize('update',$note);
        
        return view('notes.show')->with(
            [
                'note'=> $note
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        $this->authorize('update',$note);
        //showing form
        return view('notes.edit')->with([
            'note'=>$note
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $this->authorize('update',$note);
        //validation
        $validated = $this->validatedNotes($request);
        $note->update($validated);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $this->authorize('update',$note);
        //
       $note->delete();
       return redirect('notes');
    }
    protected function validatedNotes($request){
       return $request->validate([
            'title'=>['required','min:3','max:100'],
            'details'=>['required','min:10','max:1000'],
            'color'=>['required','min:3']
        ],
            [
                //adding Custome Messages
                'title.required'=>'Title not here'
            ]
        );
    }
}
