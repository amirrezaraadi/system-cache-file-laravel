<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $code ;
    public function __construct($code)
    {
        $this->code = $code ;
    }

    public function build()
    {
        return $this->markdown('mail.register' , ['code' => $this->code]);
    }

}
