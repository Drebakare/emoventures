<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BirthdayMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $send_message;

    public function __construct($send_message)
    {
        $this->send_message = $send_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Emails.birthday');
    }
}
