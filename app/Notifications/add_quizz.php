<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Quizze;

class add_quizz extends Notification
{
    use Queueable;
    private $quizzes;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( Quizze $quizzes)
    {
     $this->quizzes=$quizzes;   
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
 

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */



     public function toDatabase($notifiable)
    {
        return [

            //'data' => $this->details['body']
            'id'=> $this->quizzes->id,
            'title'=>'quizze added:',
            'user'=> Auth::user()->name,

        ];
    }
 
}
