<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class WelcomeMail extends Mailable
{
    use Queryable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function build()
    {
        return $this->subject('¡Bienvenido a nuestra aplicación!')
                    ->view('emails.welcome');
    }
}
