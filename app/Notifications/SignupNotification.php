<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SignupNotification extends Notification
{
    use Queueable;

    protected $signupnoti;

    public function __construct($signupnoti){
        $this->signupnoti = $signupnoti;
    }
    
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'userid' => $this->signupnoti['userid'],
            'name' => $this->signupnoti['name'],
            'phoneno' => $this->signupnoti['phoneno'],
            'email' => $this->signupnoti['email'],
            'role' => $this->signupnoti['role']
        ];
    }
}
