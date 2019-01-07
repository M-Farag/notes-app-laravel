<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

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
            //'notes'=> Note::all()
            'notes'=>Note::where('owner_id',auth()->id())->get()
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
        $validated = $request->validate([
            'title'=>['required','min:3','max:100'],
            'details'=>['required','min:10','max:1000'],
            'color'=>['required','min:3']
        ],
            [
                //adding Custome Messages
                'title.required'=>'Title not here'
            ]
        );
        //appending owner_id
        $validated['owner_id'] = auth()->id();
        Note::create($validated);
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
        //
        return view('notes.show')->with(
            ['note'=> $note]
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
        //validation
        $validated = $request->validate([
            'title'=>['required','min:3','max:50'],
            'details'=>['required','min:10','max:1000'],
            'color'=>['required','min:3']
        ]);
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
        //
       $note->delete();
       return redirect('notes');
    }
}
