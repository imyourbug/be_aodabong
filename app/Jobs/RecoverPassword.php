<?php

namespace App\Jobs;

use App\Mail\SendMailRecoverPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class RecoverPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $email;
    public string $new_password;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $new_password)
    {
        $this->email = $email;
        $this->new_password = $new_password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new SendMailRecoverPassword($this->new_password));
    }
}
