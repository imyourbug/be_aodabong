<?php

namespace App\Providers;

use App\Interfaces\MailServiceInterface;
use App\Interfaces\MessageServiceInterface;
use App\Services\SendMailableService;
use App\Services\SendVonageMessageService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Artisan::command();
        $this->app->bind(MailServiceInterface::class, SendMailableService::class);
        $this->app->bind(MessageServiceInterface::class, SendVonageMessageService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
