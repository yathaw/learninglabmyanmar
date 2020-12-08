<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CheckoutNotification extends Notification
{
    use Queueable;

     protected $checkoutnoti;

    public function __construct($checkoutnoti){
        $this->checkoutnoti = $checkoutnoti;
    }
    
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
             'saleid' => $this->checkoutnoti['saleid'],
            'invoiceno' => $this->checkoutnoti['invoiceno'],
            'total' => $this->checkoutnoti['total'],
            'user_id' => $this->checkoutnoti['user_id']
        ];
    }
}
