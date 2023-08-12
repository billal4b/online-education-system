<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserData extends Mailable
{
    use Queueable, SerializesModels;


    public $send_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($send_email)
    {

        $this->send_email = $send_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        //return $this->view('backend.users.mail');
        return $this->subject('Mail from iqsbd.com')
                    ->view('backend.users.mail');

    }
}
