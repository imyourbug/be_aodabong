<?php

namespace App\Jobs;

use App\Interfaces\MailServiceInterface;
use App\Mail\InforOrderMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InfoOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $email;
    public mixed $content;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $content)
    {
        $this->email = $email;
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MailServiceInterface $mailServiceInterface)
    {
        $mailServiceInterface->send(
            $this->email,
            new InforOrderMail('Thông tin đơn hàng', $this->content)
        );
    }
}
