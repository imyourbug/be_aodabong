<?php

namespace App\Jobs;

use App\Interfaces\MailServiceInterface;
use App\Interfaces\MessageServiceInterface;
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

    public mixed $customer;
    public mixed $content;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customer, $content)
    {
        $this->customer = $customer;
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MailServiceInterface $mailServiceInterface, MessageServiceInterface $messageServiceInterface)
    {
        //send mail
        $mailServiceInterface->send(
            $this->customer->email,
            new InforOrderMail('Thông tin đơn hàng', $this->content)
        );
        //send sms
        // $messageServiceInterface->send(
        //     $this->customer->phone,
        //     'Bạn vừa có đơn hàng mới'
        // );
    }
}
