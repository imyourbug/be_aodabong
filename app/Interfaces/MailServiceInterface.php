<?php

declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Mail\Mailable;

interface MailServiceInterface
{
    public function send(string $to, Mailable $mail): void;
}
