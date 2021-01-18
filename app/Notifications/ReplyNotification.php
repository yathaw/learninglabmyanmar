<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReplyNotification extends Notification
{
    use Queueable;

    protected $replynoti;

    public function __construct($replynoti){
        $this->replynoti = $replynoti;
    }
    
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
             'ranswer_id' => $this->replynoti['rid'],
            'rdescription' => $this->replynoti['rdescription'],
            'ruser_id' => $this->replynoti['ruser_id'],
            'rquestion_id' => $this->replynoti['rquestion_id']
        ];
    }
}
