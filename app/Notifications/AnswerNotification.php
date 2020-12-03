<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AnswerNotification extends Notification
{
    use Queueable;

    protected $answernoti;

    public function __construct($answernoti){
        $this->answernoti = $answernoti;
    }
    
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
             'answer_id' => $this->answernoti['id'],
            'description' => $this->answernoti['description'],
            'user_id' => $this->answernoti['user_id'],
            'question_id' => $this->answernoti['question_id']
        ];
    }
}
