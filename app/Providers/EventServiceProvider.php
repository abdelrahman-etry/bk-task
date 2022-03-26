<?php

namespace App\Providers;

namespace App\Providers;
// use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        'App\Events\SendMail' => [
            'App\Listeners\SendMailFired',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(){
        parent::boot();
    }
}
