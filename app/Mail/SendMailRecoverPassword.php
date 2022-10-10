<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailRecoverPassword extends Mailable
{
    use Queueable, SerializesModels;

    public string $new_password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $new_password)
    {
        $this->new_password = $new_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.recover_password', [
            'new_password' => $this->new_password
        ]);
    }
}
