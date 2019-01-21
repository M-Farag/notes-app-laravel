<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use App\Mail\NoteCreated;
use App\Mail\NoteDeleted;
use App\Events\NoteCreatedEvent;
use App\Notifications\NoteCreatedNotification;

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
        $user = auth()->user();
        //$user->unreadNotifications->markAsRead();
        //
        return view('notes.index')->with([
            'user'=> $user
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
        if($request->has('image')){
            $validated['image']= $request->file('image')->store('images/'.auth()->id(),'ftp');
        }
        
        $note = Note::create($validated);
        //send Mail
            // \Mail::to($note->owner->email)->send(
            //     new NoteCreated($note)
            // );
        //fire custome event
            //event(new NoteCreatedEvent($note));
        //using Notify
        //auth()->user()->notify(new NoteCreatedNotification($note));

        //session-Notification
            //session()->flash('message','project Created');
        //calling helper function to save session
        flash('Project Created');
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
                'note'=> $note,
                'noteImagePath'=> $this->noteImagePath($note,'ftp')
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
            'note'=>$note,
            'noteImagePath'=> $this->noteImagePath($note,'ftp')
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
        if($request->has('image')){
            //delete old image
            $this->deleteNoteImage($note,'ftp');
           $validated['image'] = \Storage::disk('ftp')->put('images/'.auth()->id(),$request->file('image'));
        }
        $note->update($validated);

        
        return redirect('/notes/'.$note->id);
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
        //deleting attachedFiles if exist
        $this->deleteNoteImage($note,'ftp');
        // # Note-hook-email #  
       $note->delete();
       return redirect('notes');
    }
    protected function validatedNotes($request){
       return $request->validate([
            'title'=>['required','min:3','max:100'],
            'details'=>['required','min:10','max:1000'],
            'color'=>['nullable','min:3'],
            'image'=>['image']
        ],
            [
                //adding Custome Messages
                'title.required'=>'Title not here'
            ]
        );
    }

    //deleting attached Images
    protected function deleteNoteImage($note,$disk =''){
        \Storage::disk($disk)->delete($note->image);
    }

    protected function noteImagePath($note,$disk = ''){
       if($note->image){
             if($disk === 'ftp'){
                return config('filesystems.disks.ftp.url').'/'.$note->image;
            }
       }else{
        return null;
       }
        
    }
}
