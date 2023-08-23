<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\MailServiceInterface;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class SendMailableService implements MailServiceInterface
{
    public function send(string $to, Mailable $mail): void
    {
        Mail::to($to)->send($mail);
    }
}
