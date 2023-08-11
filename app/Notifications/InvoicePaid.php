<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;

    private $invoicedata;

   
    public function __construct($invoicedata)
    
    {
        $this->invoicedata = $invoicedata;
    }

   
    public function via($notifiable)
    {
        return ['mail'];
    }

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->invoicedata['body'])
                    ->action($this->invoicedata['text'], $this->invoicedata['url'])
                    ->line($this->invoicedata['thankyou']);
    }

  
  
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
