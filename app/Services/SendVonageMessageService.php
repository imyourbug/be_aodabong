<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\MessageServiceInterface;

class SendVonageMessageService implements MessageServiceInterface
{
    private const TYPE = 'unicode';

    public function send(string $to, string $content): void
    {
        $basic  = new \Vonage\Client\Credentials\Basic(env('VONAGE_KEY'), env('VONAGE_SECRET'));
        $client = new \Vonage\Client($basic, [], new \GuzzleHttp\Client(['verify' => false]));
        $phone = preg_replace('/0/', '84', $to, 1);
        $client->sms()->send(
            new \Vonage\SMS\Message\SMS($phone, env('VONAGE_SMS_FROM', ''), $content, self::TYPE)
        );
    }
}
