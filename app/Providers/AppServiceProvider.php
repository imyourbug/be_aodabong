<?php

namespace App\Providers;

use App\Interfaces\MailServiceInterface;
use App\Services\SendMailableService;
use Illuminate\Support\Facades\Artisan;
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
