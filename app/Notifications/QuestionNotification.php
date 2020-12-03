<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuestionNotification extends Notification
{
    use Queueable;

    protected $questionnoti;

    public function __construct($questionnoti){
        $this->questionnoti = $questionnoti;
    }
    
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
             'id' => $this->questionnoti['id'],
            'title' => $this->questionnoti['title'],
            'description' => $this->questionnoti['description'],
            'user_id' => $this->questionnoti['user_id'],
            'course_id' => $this->questionnoti['course_id']
        ];
    }
}
