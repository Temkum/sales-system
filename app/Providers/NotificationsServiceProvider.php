<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class NotificationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer('*', function ($view) {
            $notifications = auth()->check() ? auth()->user()->unreadNotifications : collect();
            $view->with('notifications', $notifications);
        });
    }
}
