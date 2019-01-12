<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NoteCreatedNotification extends Notification
{
    use Queueable;

    public $note;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($note)
    {
        //
        $this->note = $note;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('MyNotes added: '.$this->note->title)
                    ->line($this->note->title.' note has been added to your '.auth()->user()->name.'@MyNotes')
                    ->action('view Notification', url('/notes/'.$this->note->id))
                    ->line('Thank you for using MyNotes');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
            'msg'=>'You have added a note: '.$this->note->title,
        ];
    }
}
