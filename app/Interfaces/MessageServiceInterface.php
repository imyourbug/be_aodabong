<?php

declare(strict_types=1);

namespace App\Interfaces;

interface MessageServiceInterface
{
    public function send(string $to, string $content): void;
}
