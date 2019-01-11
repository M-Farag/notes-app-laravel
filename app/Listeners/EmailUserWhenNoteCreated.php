<?php

namespace App\Listeners;

use App\Events\NoteCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\NoteCreated;
class EmailUserWhenNoteCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NoteCreatedEvent  $event
     * @return void
     */
    public function handle(NoteCreatedEvent $event)
    {
        //
        \Mail::to($event->note->owner->email)->send(
            new NoteCreated($event->note)
        );
    }
}
