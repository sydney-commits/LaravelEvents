<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user;
    }

    public function build()
    {
        return $this->view('emails.user-registered')
        ->with([
            'name' => $this->user->name,
            'email' => $this->user->email,
        ])
        ->subject('Welcome to MySite');
    }
}
